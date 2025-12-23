<?php

namespace App\Controllers;

class Page extends BaseController {
    // LOGIN
    public function login() {
        return view('auth/login');
    }

    public function home() {
        return view('pages/view_home', [
            'menu' => 'dashboard',
            'pageTitle' => 'Dashboard',
            'subTitle' => 'Selamat Datang! Ini adalah ringkasan keuangan anda'
        ]);
    }
}