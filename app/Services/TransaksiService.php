<?php

namespace App\Services;

use App\Models\TransaksiModel;

class TransaksiService {
    // public function getTransaksi($userId, $mode, $value){
    //     $model = new TransaksiModel();

    //     if ($mode === 'daily') {
    //         $model->where('DATE(transaction_at)', $value);
    //     } else {
    //         $model->where('DATE_FORMAT(transaction_at, "%Y-%m")', $value);
    //     }

    //     return $model
    //         ->select('
    //         transaksi.*,
    //         kategori.nama_kategori
    //         ')
    //         ->join('kategori', 'kategori.kategori_id = transaksi.kategori_id', 'left')
    //         ->join('dompet', 'dompet.dompet_id = transaksi.dompet_id', 'left')
    //         ->where('transaksi.user_id', $userId)
    //         ->orderBy('transaction_at', 'DESC')
    //         ->findAll();
    // }

    public function getList($userId, $mode, $value, $page = 1){
        $limit  = 5;
        $offset = ($page - 1) * $limit;

        /*
        |--------------------------------------------------------------------------
        | COUNT QUERY
        |--------------------------------------------------------------------------
        */
        $countBuilder = (new TransaksiModel())
            ->where('transaksi.user_id', $userId);

        if ($mode === 'daily') {
            $countBuilder->where('DATE(transaction_at)', $value);
        } else {
            $countBuilder->where('DATE_FORMAT(transaction_at, "%Y-%m")', $value);
        }

        $totalData = $countBuilder->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | LIST QUERY (JOIN + LIMIT)
        |--------------------------------------------------------------------------
        */
        $listBuilder = (new TransaksiModel())
            ->select('
                transaksi.transaksi_id,
                transaksi.type,
                transaksi.nominal,
                transaksi.transaction_at,
                kategori.nama_kategori
            ')
            ->join('kategori', 'kategori.kategori_id = transaksi.kategori_id', 'left')
            ->where('transaksi.user_id', $userId);

        if ($mode === 'daily') {
            $listBuilder->where('DATE(transaction_at)', $value);
        } else {
            $listBuilder->where('DATE_FORMAT(transaction_at, "%Y-%m")', $value);
        }

        $list = $listBuilder
            ->orderBy('transaction_at', 'DESC')
            ->findAll($limit, $offset);

        return [
            'data' => $list,
            'pagination' => [
                'current_page' => (int) $page,
                'total_page'   => (int) ceil($totalData / $limit)
            ]
        ];
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

        $total = $pemasukan - $pengeluaran;

        return [
            'total'             => (int) $total,
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