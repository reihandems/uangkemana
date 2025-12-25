<?php

namespace App\Controllers;

use App\Services\TransaksiService;

use App\Models\TransaksiModel;
use App\Models\DompetModel;

class Transaksi extends BaseController
{
    public function store()
    {
        $db = \Config\Database::connect();
        $db->transStart(); // 🔒 mulai transaction

        try {
            $userId = session()->get('user_id');

            $dompetId  = $this->request->getPost('dompet_id');
            $kategoriId = $this->request->getPost('kategori_id');
            $type      = $this->request->getPost('type');
            $nominal   = (float) $this->request->getPost('nominal');

            // Gabung tanggal + jam
            $tanggal = $this->request->getPost('tanggal');
            $jam     = $this->request->getPost('jam');
            $transactionAt = $tanggal . ' ' . $jam . ':00';

            $transaksiModel = new TransaksiModel();
            $dompetModel    = new DompetModel();

            // 1️⃣ Simpan transaksi
            $transaksiModel->insert([
                'user_id'        => $userId,
                'dompet_id'      => $dompetId,
                'kategori_id'    => $kategoriId,
                'type'           => $type,
                'nominal'        => $nominal,
                'transaction_at' => $transactionAt,
                'note'           => $this->request->getPost('note')
            ]);

            // 2️⃣ Ambil saldo dompet sekarang
            $dompet = $dompetModel->find($dompetId);

            if (!$dompet) {
                throw new \Exception('Dompet tidak ditemukan');
            }

            // 3️⃣ Hitung saldo baru
            if ($type === 'Pemasukan') {
                $saldoBaru = $dompet['saldo'] + $nominal;
            } else {
                $saldoBaru = $dompet['saldo'] - $nominal;

                if ($saldoBaru < 0) {
                    throw new \Exception('Saldo tidak mencukupi');
                }
            }

            // 4️⃣ Update saldo dompet
            $dompetModel->update($dompetId, [
                'saldo' => $saldoBaru
            ]);

            $db->transComplete(); // ✅ commit

            return redirect()->back()
                ->with('success', 'Transaksi berhasil ditambahkan');

        } catch (\Throwable $e) {

            $db->transRollback(); // ❌ rollback

            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }
    }

    public function data(){
        $mode  = $this->request->getGet('mode');
        $value = $this->request->getGet('value');
        $userId = session()->get('user_id');

        $service = new TransaksiService();

        return $this->response->setJSON([
            'summary' => $service->getSummary($userId, $mode, $value),
            'list'    => $service->getTransaksi($userId, $mode, $value),
            'chart'   => $service->getChartKategori($userId, $mode, $value)
        ]);
    }
}
