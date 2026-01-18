<?php

namespace App\Controllers;

use App\Models\BudgetModel;

class Budget extends BaseController {
    public function index() {
        $userId = session()->get('user_id');

        $service = new \App\Services\BudgetService();

        $bulan = $this->request->getGet('bulan') ?? date('Y-m');

        $data = $this->loadGlobalData();

        $data['menu'] = 'budget';
        $data['pageTitle'] = 'Budget';
        $data['subTitle'] = 'Rencanakan dan lacak tujuan pengeluaran anda';
        $data['bulan'] = $bulan;

        $data['budgets'] = $service->getBudgetWithProgress(
            session()->get('user_id'),
            $bulan
        );
        
        return view('pages/view_budget', $data);
    }

    public function store(){
        $service = new \App\Services\BudgetService();

        try {
            $service->createBudget(
                session()->get('user_id'),
                [
                    'kategori_id'   => $this->request->getPost('kategori_id'),
                    'limit_amount' => (int) $this->request->getPost('limit_amount'),
                    'bulan'         => $this->request->getPost('bulan')
                ]
            );

            return redirect()->back()->with('success', 'Budget berhasil ditambahkan');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update($id){
        $model = new BudgetModel();

        $model->update($id, [
            'nama_budget'  => $this->request->getPost('nama_budget'),
            'kategori_id'  => $this->request->getPost('kategori_id'),
            'limit_amount' => $this->request->getPost('limit_amount'),
            'bulan' => $this->request->getPost('bulan')
        ]);

        return redirect()->to('/user/budget')
            ->with('success', 'Budget berhasil diperbarui');
    }

    public function delete($id){
        $model = new BudgetModel();
        $model->delete($id);

        return redirect()->to('/user/budget')
            ->with('success', 'Budget berhasil dihapus');
    }


}