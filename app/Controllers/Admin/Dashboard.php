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
        // Total user bulan lalu
        $lastMonth = date('Y-m', strtotime('-1 month'));
        $totalUserLastMonth = $this->userModel
            ->where('DATE_FORMAT(created_at, "%Y-%m")', $lastMonth)
            ->countAllResults();

        
        $data = [
            'menu' => 'dashboard',
            'pageTitle' => 'Dashboard',
            'totalUser' => $this->userModel->countAllResults(),
            'totalKategori' => $this->kategoriModel->countAllResults()
        ];

        // Hitung persentase perubahan
        if ($totalUserLastMonth > 0) {
            $userGrowth = (($data['totalUser'] - $totalUserLastMonth) / $totalUserLastMonth) * 100;
            $data['userGrowth'] = round($userGrowth, 1); // 1 angka desimal
            $data['userGrowthText'] = $userGrowth > 0 ? 'more' : 'less';
        } else {
            $data['userGrowth'] = 0;
            $data['userGrowthText'] = 'more';
        }

        return view('pages/admin/view_dashboard', $data);
    }
}