<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DataUser extends BaseController {
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index() {
        $model = $this->userModel;
        // Ambil keyword dari pencarian (input name="keyword")
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $model->like('name', $keyword)
                ->orLike('email', $keyword);
        }

        $data = [
            'menu' => 'data-user',
            'pageTitle' => 'Data User',
            'users' => $model->paginate(10, 'users'), // 10 data per page
            'pager'    => $model->pager,
            'keyword'  => $keyword
        ];

        return view('pages/admin/view_user', $data);
    }

    public function delete($id)
    {
        $model = $this->userModel;
        $user = $model->find($id);

        if (!$user) {
            return redirect()->to('/admin/data-user')->with('error', 'Data tidak ditemukan');
        }

        $model->delete($id);

        return redirect()->to('/admin/data-user')->with('success', 'Data berhasil dihapus');
    }
}
