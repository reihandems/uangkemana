<?php

namespace App\Controllers;
use App\Controllers\Dashboard;

class Page extends BaseController {
    public function landingPage() {
        return view('landing_page');
    }

    // LOGIN
    public function login() {
        return view('auth/login');
    }
    
    public function dompet() {
        return view('pages/view_dompet', [
            'menu' => 'dompet',
            'pageTitle' => 'Dompet',
            'subTitle' => 'Buat dompet untuk menyimpan transaksi'
        ]);
    }

    public function settings() {
        return view('pages/view_settings', [
            'menu' => 'settings',
            'pageTitle' => 'Settings'
        ]);
    }
}