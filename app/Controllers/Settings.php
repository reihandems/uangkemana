<?php

namespace App\Controllers;

use App\Models\UserModel;

class Settings extends BaseController {
    public function index() {
        $userId = session()->get('user_id');

        $user = (new UserModel())->find($userId);

        $data = $this->loadGlobalData();

        $data['menu'] = 'settings';
        $data['pageTitle'] = 'Settings';
        $data['user'] = $user;

        return view('pages/view_settings', $data);
    }

    public function update(){
        $userId = session()->get('user_id');

        $rules = [
            'name' => [
                'rules'  => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required'   => 'Nama tidak boleh kosong',
                    'min_length' => 'Nama minimal 3 karakter',
                    'max_length' => 'Nama maksimal 100 karakter'
                ]
            ],
            'gambar' => [
                'rules'  => 'permit_empty|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2048]',
                'errors' => [
                    'is_image' => 'File harus berupa gambar',
                    'mime_in'  => 'Format gambar harus JPG atau PNG',
                    'max_size' => 'Ukuran gambar maksimal 2MB'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $data = [
            'name' => $this->request->getPost('name')
        ];

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && ! $gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move('uploads/profile', $newName);
            $data['gambar'] = $newName;
        }

        $model->update($userId, $data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

}