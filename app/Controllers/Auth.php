<?php 

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\DompetModel;
use App\Models\AdminModel;

class Auth extends BaseController {
    public function login() {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess(){
        $session = session();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
        // Validasi login
        if ($user && password_verify($password, $user['password'])) {
            return $this->setSession($user['user_id'], $user, $user['name'], $user['gambar'], 'user');
        }

        $adminModel = new AdminModel();
        $user = $adminModel->where('email', $email)->first();
        if ($user && password_verify($password, $user['password'])) {
            return $this->setSession($user['admin_id'], $user, $user['nama_admin'], $user['gambar'], 'admin');
        }

        return redirect()->back()->with('error', 'Email atau password salah.')->withInput();
    }

    private function setSession($id, $userData, $nama, $gambar, $role) {
        session()->set([
            'logged_in' => true,
            'user_id'    => $id,
            'user_email' => $userData['email'],
            'user_nama'  => $nama,
            'user_gambar' => $gambar,
            'role' => $role
        ]);

        if ($role === 'user') {
            return redirect()->to('/user/dashboard');
        } elseif ($role === 'admin') {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email atau password salah!')->withInput();
        }

    }


    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function registerBuatAkun() {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        return view('auth/register');
    }

    public function registerBuatAkunProcess() {
        $model = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('password_confirm');

        // 1. Cek konfirmasi password
        if ($password !== $passwordConfirm) {
            return redirect()->back()
                ->with('error', 'Konfirmasi password tidak sesuai')
                ->withInput();
        }

        // 2. Cek email sudah terdaftar
        if ($model->where('email', $email)->first()) {
            return redirect()->back()
                ->with('error', 'Email sudah terdaftar')
                ->withInput();
        }

        $session = session();
        $session->set('register', [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        
        return redirect()->to('/register/buat-dompet');
    }

    public function registerBuatDompet() {
        if (!session()->has('register')) {
            return redirect()->to('/register');
        }

        return view('auth/register_buatdompet');
    }

    public function registerBuatDompetProcess() {
        $session = session();
        $dataUser = $session->get('register');

        if (!$dataUser) {
            return redirect()->to('/register');
        }

        $userModel = new UserModel();
        $dompetModel = new DompetModel();

        // Simpan user
        $userId = $userModel->insert([
            'name' => $dataUser['name'],
            'email' => $dataUser['email'],
            'password' => $dataUser['password']
        ], true);

        // Simpan dompet
        $dompetModel->insert([
            'user_id' => $userId,
            'nama_dompet' => $this->request->getPost('nama_dompet'),
            'saldo' => $this->request->getPost('saldo')
        ]);

        // Bersihkan session register
        $session->remove('register');

        return redirect()->to('/login')
            ->with('success', 'Registrasi berhasil');
    }
}