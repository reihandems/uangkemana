<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KategoriModel;

class Dashboard extends BaseController {
    protected $userModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index() {
        $data = [
            'menu' => 'dashboard',
            'pageTitle' => 'Dashboard'
        ];

        return view('pages/admin/view_dashboard', $data);
    }
}