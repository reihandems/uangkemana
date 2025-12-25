<?php

namespace App\Services;

use App\Models\TransaksiModel;

class TransaksiService {
    public function getTransaksi($userId, $mode, $value){
        $model = new TransaksiModel();

        if ($mode === 'daily') {
            $model->where('DATE(transaction_at)', $value);
        } else {
            $model->where('DATE_FORMAT(transaction_at, "%Y-%m")', $value);
        }

        return $model
            ->select('
            transaksi.*,
            kategori.nama_kategori
            ')
            ->join('kategori', 'kategori.kategori_id = transaksi.kategori_id', 'left')
            ->join('dompet', 'dompet.dompet_id = transaksi.dompet_id', 'left')
            ->where('transaksi.user_id', $userId)
            ->orderBy('transaction_at', 'DESC')
            ->findAll();
    }

    public function getSummary($userId, $mode, $value){
        $pemasukanModel  = new TransaksiModel();
        $pengeluaranModel = new TransaksiModel();

        if ($mode === 'daily') {
            $pemasukanModel->where('DATE(transaction_at)', $value);
            $pengeluaranModel->where('DATE(transaction_at)', $value);
        } else {
            $pemasukanModel->where('DATE_FORMAT(transaction_at, "%Y-%m")', $value);
            $pengeluaranModel->where('DATE_FORMAT(transaction_at, "%Y-%m")', $value);
        }

        $pemasukan = $pemasukanModel
            ->where('user_id', $userId)
            ->where('type', 'Pemasukan')
            ->selectSum('nominal')
            ->first()['nominal'] ?? 0;

        $pengeluaran = $pengeluaranModel
            ->where('user_id', $userId)
            ->where('type', 'Pengeluaran')
            ->selectSum('nominal')
            ->first()['nominal'] ?? 0;

        return [
            'total_pemasukan'   => (int) $pemasukan,
            'total_pengeluaran' => (int) $pengeluaran
        ];
    }


    public function getChartKategori($userId, $mode, $value){
        $model = new TransaksiModel();

        if ($mode === 'daily') {
            $model->where('DATE(transaction_at)', $value);
        } else {
            $model->where('DATE_FORMAT(transaction_at, "%Y-%m")', $value);
        }

        return $model
            ->select('kategori.nama_kategori, SUM(nominal) as total')
            ->join('kategori', 'kategori.kategori_id = transaksi.kategori_id')
            ->where('transaksi.user_id', $userId)
            ->groupBy('kategori.kategori_id')
            ->findAll();
    }

}