<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriModel;

class DataKategori extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $model = $this->kategoriModel;
        // Ambil keyword dari pencarian (input name="keyword")
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $model->like('nama_kategori', $keyword)
                ->orLike('type', $keyword);
        }

        $data = [
            'menu' => 'data-kategori',
            'pageTitle' => 'Data Kategori',
            'kategori' => $model->paginate(10, 'kategori'), // 10 data per page
            'pager'    => $model->pager,
            'keyword'  => $keyword
        ];

        return view('pages/admin/view_kategori', $data);
    }

    public function create()
    {
        $data = [
            'menu' => 'data-kategori',
            'pageTitle' => 'Data Kategori'
        ];

        return view('pages/admin/view_kategori_create', $data);
    }

    public function store()
    {
        $model = $this->kategoriModel;

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'type' => $this->request->getPost('type')
        ];

        $model->insert($data);

        return redirect()->to('/admin/data-kategori')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = $this->kategoriModel;
        $kategori = $model->find($id);

        $data = [
            'menu' => 'data-kategori',
            'pageTitle' => 'Data Kategori',
            'kategori' => $kategori
        ];

        if (!$data['kategori']) {
            return redirect()->to('/admin/data-kategori')->with('error', 'Data tidak ditemukan');
        }

        return view('pages/admin/view_kategori_edit', $data);
    }

    public function update($id)
    {
        $model = $this->kategoriModel;

        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'type' => $this->request->getPost('type')
        ];

        $model->update($id, $data);

        return redirect()->to('/admin/data-kategori')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $model = $this->kategoriModel;
        $kategori = $model->find($id);

        if (!$kategori) {
            return redirect()->to('/admin/data-kategori')->with('error', 'Data tidak ditemukan');
        }

        $model->delete($id);

        return redirect()->to('/admin/data-kategori')->with('success', 'Data berhasil dihapus');
    }
}
