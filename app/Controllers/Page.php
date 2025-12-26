<?php

namespace App\Controllers;
use App\Controllers\Dashboard;

class Page extends BaseController {
    // LOGIN
    public function login() {
        return view('auth/login');
    }

    public function transaksiDetail() {
        return view('pages/view_transaksi_detail', [
            'menu' => 'transaksi',
            'pageTitle' => 'Detail Transaksi'
        ]);
    }

    public function budget() {
        return view('pages/view_budget', [
            'menu' => 'budget',
            'pageTitle' => 'Budget',
            'subTitle' => 'Rencanakan dan lacak tujuan pengeluaran anda'
        ]);
    }

    public function budgetDetail() {
        return view('pages/view_budget_detail', [
            'menu' => 'budget',
            'pageTitle' => 'Detail Budget'
        ]);
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