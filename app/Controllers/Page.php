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

    public function transaksi() {
        return view('pages/view_transaksi', [
            'menu' => 'transaksi',
            'pageTitle' => 'Transaksi',
            'subTitle' => 'Lacak dan analisis keuangan anda'
        ]);
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
}