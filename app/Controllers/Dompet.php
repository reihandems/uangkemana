<?php

namespace App\Controllers;

use App\Models\DompetModel;

class Dompet extends BaseController {
    public function index() {
        $userId = session()->get('user_id');

        $model = new DompetModel();

        $data = $this->loadGlobalData();

        $data['dompet'] = $model->where('user_id', $userId)->findAll();

        $data['menu'] = 'dompet';
        $data['pageTitle'] = 'Dompet';
        $data['subTitle'] = 'Buat dompet untuk menyimpan transaksi';

        return view('pages/view_dompet', $data);
    }

    public function store() {
        $model = new DompetModel();

        $model->insert([
            'user_id'     => session()->get('user_id'),
            'nama_dompet' => $this->request->getPost('nama_dompet'),
            'saldo'       => (int) $this->request->getPost('saldo')
        ]);

        return redirect()->to('/dompet')->with('success', 'Dompet berhasil ditambahkan');
    }

    public function update($id){
        $model = new DompetModel();

        $model->update($id, [
            'nama_dompet' => $this->request->getPost('nama_dompet')
        ]);

        return redirect()->to('/dompet')->with('success', 'Dompet berhasil diperbarui');
    }

    public function delete($id){
        $model = new DompetModel();

        $model->delete($id);

        return redirect()->to('/dompet')->with('success', 'Dompet berhasil dihapus');
    }


}