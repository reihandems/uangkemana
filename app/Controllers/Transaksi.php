<?php

namespace App\Controllers;

use App\Services\TransaksiService;

use App\Models\TransaksiModel;
use App\Models\DompetModel;
use App\Models\KategoriModel;

class Transaksi extends BaseController
{
    public function index() {
        $data = $this->loadGlobalData();

        $data['menu'] = 'transaksi';
        $data['pageTitle'] = 'Transaksi';
        $data['subTitle'] = 'Lacak dan analisis transaksi keuangan anda';

        return view('pages/view_transaksi', $data);
    }

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
        $userId = session()->get('user_id');
        $mode   = $this->request->getGet('mode');
        $value  = $this->request->getGet('value');
        $page   = (int) ($this->request->getGet('page') ?? 1);

        $service = new TransaksiService();

        $listData = $service->getList($userId, $mode, $value, $page);

        return $this->response->setJSON([
            'summary' => $service->getSummary($userId, $mode, $value),
            'chart'   => $service->getChartKategori($userId, $mode, $value),
            'list'       => $listData['data'],
            'pagination' => $listData['pagination']
        ]);
    }

    public function detail($id) {
        $model = new TransaksiModel();

        $data = $this->loadGlobalData();

        $data['menu'] = 'transaksi';
        $data['pageTitle'] = 'Detail Transaksi';
        $data['transaksi'] = $model->select('
            transaksi.*,
            kategori.nama_kategori
            ')
            ->join('kategori', 'kategori.kategori_id = transaksi.kategori_id', 'left')
            ->join('dompet', 'dompet.dompet_id = transaksi.dompet_id', 'left')
            ->orderBy('transaction_at', 'DESC')
            ->find($id);

        if(!$data['transaksi']) {
            return redirect()->to('/transaksi');
        }

        return view('pages/view_transaksi_detail', $data);
    }

    public function edit($id){
        $userId = session()->get('user_id');

        $transaksiModel = new TransaksiModel();
        $kategoriModel  = new KategoriModel();
        $dompetModel    = new DompetModel();

        $transaksi = $transaksiModel
            ->where('transaksi_id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$transaksi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        $data = $this->loadGlobalData();
        $data['transaksi'] = $transaksi;
        $data['kategori']  = $kategoriModel->findAll();
        $data['dompet']    = $dompetModel->where('user_id', $userId)->findAll();

        $data['pageTitle'] = 'Edit Transaksi';

        return view('pages/view_edit_transaksi', $data);
    }

    public function update($id){
        $userId = session()->get('user_id');

        $transaksiModel = new TransaksiModel();
        $dompetModel    = new DompetModel();

        // Ambil transaksi lama
        $transaksiLama = $transaksiModel->find($id);

        if (!$transaksiLama) {
            return redirect()->to('/user/transaksi');
        }

        // =========================
        // ROLLBACK SALDO LAMA
        // =========================
        $nominalLama = (int) $transaksiLama['nominal'];
        $typeLama    = $transaksiLama['type'];

        if ($typeLama === 'Pemasukan') {
            $dompetModel->decrement('saldo', $nominalLama);
        } else {
            $dompetModel->increment('saldo', $nominalLama);
        }

        // =========================
        // DATA BARU
        // =========================
        $nominalBaru = (int) $this->request->getPost('nominal');
        $typeBaru    = $this->request->getPost('type');

        // =========================
        // APPLY SALDO BARU
        // =========================
        if ($typeBaru === 'Pemasukan') {
            $dompetModel->increment('saldo', $nominalBaru);
        } else {
            $dompetModel->decrement('saldo', $nominalBaru);
        }

        // =========================
        // TANGGAL & JAM
        // =========================
        $tanggal = $this->request->getPost('tanggal');
        $jam     = $this->request->getPost('jam');

        if ($tanggal && $jam) {
            $transactionAt = $tanggal . ' ' . $jam;
        } else {
            $transactionAt = $transaksiLama['transaction_at'];
        }

        // =========================
        // UPDATE TRANSAKSI
        // =========================
        $transaksiModel->update($id, [
            'dompet_id'      => $this->request->getPost('dompet_id'),
            'kategori_id'    => $this->request->getPost('kategori_id'),
            'type'           => $typeBaru,
            'nominal'        => $nominalBaru,
            'transaction_at' => $transactionAt,
            'note'           => $this->request->getPost('note'),
        ]);

        return redirect()->to('/user/transaksi')
            ->with('success', 'Transaksi berhasil diperbarui');
    }


    public function delete($id){
        $transaksiModel = new TransaksiModel();
        $dompetModel    = new DompetModel();

        $transaksi = $transaksiModel->find($id);

        if (!$transaksi) {
            return redirect()->to('/user/transaksi');
        }

        $nominal  = (int) $transaksi['nominal']; // 🔴 WAJIB CAST
        $type     = $transaksi['type'];
        $dompetId = $transaksi['dompet_id'];

        // =========================
        // RESTORE SALDO
        // =========================
        if ($type === 'Pemasukan') {
            $dompetModel->where('dompet_id', $dompetId)
                        ->decrement('saldo', $nominal);
        } else {
            $dompetModel->where('dompet_id', $dompetId)
                        ->increment('saldo', $nominal);
        }

        // =========================
        // DELETE TRANSAKSI
        // =========================
        $transaksiModel->delete($id);

        return redirect()->to('/user/transaksi')
            ->with('success', 'Transaksi berhasil dihapus');
    }


}
