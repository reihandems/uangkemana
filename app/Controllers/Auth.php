<?php 

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController {
    public function login() {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess(){
        $session = session();
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Ambil user + role
        $user = $model->where('email', $email)->first();

        // Validasi login
        if ($user || password_verify($password, $user['password'])) {
            // Set session
            $session->set([
                'user_id'    => $user['user_id'],
                'user_nama'  => $user['name'],  
                'user_email' => $user['email'],
                'user_gambar' => $user['gambar'],
                'logged_in'  => true
            ]);
            return redirect()->to('/dashboard');
        }
        return redirect()->back()->with('error', 'Email atau password salah.')->withInput();
    }


    public function logout() {
        session()->destroy();
        return redirect()->to('/login');
    }
}