<?php

namespace App\Controllers;

use App\Models\DompetModel;
use App\Models\BudgetModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');

        $dompetModel    = new DompetModel();
        $budgetModel    = new BudgetModel();
        $transaksiModel = new TransaksiModel();

        // 1. Total saldo dompet
        $totalSaldo = $dompetModel
            ->selectSum('saldo')
            ->where('user_id', $userId)
            ->first()['saldo'] ?? 0;

        // 2. Budget terbaru
        $budgetTerbaru = $budgetModel
            ->select('budget.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.kategori_id = budget.kategori_id', 'left')
            ->where('budget.user_id', $userId)
            ->orderBy('budget.created_at', 'DESC')
            ->first();

        // 3. Total pemasukan
        $totalPemasukan = $transaksiModel
            ->selectSum('nominal')
            ->where('user_id', $userId)
            ->where('type', 'Pemasukan')
            ->first()['nominal'] ?? 0;

        // 4. Total pengeluaran
        $totalPengeluaran = $transaksiModel
            ->selectSum('nominal')
            ->where('user_id', $userId)
            ->where('type', 'Pengeluaran')
            ->first()['nominal'] ?? 0;

        // 5. Transaksi terbaru (5)
        $transaksiTerbaru = $transaksiModel
            ->select('transaksi.*, kategori.nama_kategori, dompet.nama_dompet')
            ->join('kategori', 'kategori.kategori_id = transaksi.kategori_id')
            ->join('dompet', 'dompet.dompet_id = transaksi.dompet_id')
            ->where('transaksi.user_id', $userId)
            ->orderBy('transaction_at', 'DESC')
            ->findAll(3);

        // Ambil tanggal terakhir transaksi
        $tanggalTerakhir = null;
        if (!empty($transaksiTerbaru)) {
            $tanggalTerakhir = $transaksiTerbaru[0]['transaction_at'];
        }

        $data = $this->loadGlobalData();

        $data['menu'] = 'dashboard';
        $data['pageTitle'] = 'Dashboard';
        $data['subTitle'] = 'Selamat datang! ini adalah ringkasan keuangan anda';

        $data ['totalSaldo'] = $totalSaldo;
        $data ['budgetTerbaru'] = $budgetTerbaru;
        $data ['totalPemasukan'] = $totalPemasukan;
        $data ['totalPengeluaran'] = $totalPengeluaran;
        $data ['transaksiTerbaru'] = $transaksiTerbaru;
        $data ['tanggalTerakhir'] = $tanggalTerakhir;

        return view('pages/view_home', $data);
    }
}
