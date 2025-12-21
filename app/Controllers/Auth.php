<?php 

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController {
    public function login() {
        if (session()->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess(){
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Ambil user + role
        $user = $model->getUserByEmail($email);

        // Validasi login
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()
                ->with('error', 'Email atau Password salah.')
                ->withInput();
        }

        // Set session
        $session->set([
            'user_id'    => $user['user_id'],
            'user_nama'  => $user['name'],  
            'user_email' => $user['email'],
            'user_gambar' => $user['gambar'],
            'logged_in'  => true
        ]);
    }


    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}