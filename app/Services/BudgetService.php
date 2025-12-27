<?php

namespace App\Services;

use App\Models\BudgetModel;
use App\Models\TransaksiModel;

class BudgetService
{
    public function getBudgetByMonth(int $userId, string $bulan): array
    {
        $db = db_connect();

        $builder = $db->table('budget b');

        $builder->select([
            'b.budget_id',
            'b.kategori_id',
            'k.nama_kategori',
            'b.limit_amount',
            'COALESCE(SUM(t.nominal), 0) AS total_pengeluaran',
            'ROUND(
                (COALESCE(SUM(t.nominal), 0) / b.limit_amount) * 100, 
                2
            ) AS progress'
        ]);

        $builder->join('kategori k', 'k.kategori_id = b.kategori_id');
        $builder->join(
            'transaksi t',
            "t.kategori_id = b.kategori_id
             AND t.type = 'Pengeluaran'
             AND DATE_FORMAT(t.transaction_at, '%Y-%m') = b.bulan
             AND t.user_id = b.user_id",
            'left'
        );

        $builder->where('b.user_id', $userId);
        $builder->where('b.bulan', $bulan);
        $builder->groupBy('b.budget_id');

        return $builder->get()->getResultArray();
    }

    public function createBudget(int $userId, array $data){
        $model = new BudgetModel();

        // Cek duplicate
        $exists = $model
            ->where('user_id', $userId)
            ->where('kategori_id', $data['kategori_id'])
            ->where('bulan', $data['bulan'])
            ->first();

        if ($exists) {
            throw new \Exception('Budget untuk kategori ini sudah ada di bulan tersebut.');
        }

        return $model->insert([
            'user_id'      => $userId,
            'kategori_id'  => $data['kategori_id'],
            'limit_amount'=> $data['limit_amount'],
            'bulan'        => $data['bulan']
        ]);
    }

    public function getBudgetWithProgress(int $userId, string $bulan){
        $budgetModel = new BudgetModel();
        $transaksiModel = new TransaksiModel();

        $budgets = $budgetModel
            ->select('budget.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.kategori_id = budget.kategori_id')
            ->where('budget.user_id', $userId)
            ->where('budget.bulan', $bulan)
            ->findAll();

        foreach ($budgets as &$b) {

            $total = $transaksiModel
                ->selectSum('nominal')
                ->where('user_id', $userId)
                ->where('kategori_id', $b['kategori_id'])
                ->where('type', 'Pengeluaran')
                ->where('DATE_FORMAT(transaction_at, "%Y-%m")', $bulan)
                ->first()['nominal'] ?? 0;

            $progress = ($b['limit_amount'] > 0)
                ? round(($total / $b['limit_amount']) * 100)
                : 0;

            // 🔥 STATUS
            if ($progress < 70) {
                $status = 'aman';
            } elseif ($progress < 100) {
                $status = 'hampir';
            } else {
                $status = 'over';
            }

            $b['total_pengeluaran'] = (int) $total;
            $b['progress'] = min($progress, 100);
            $b['status'] = $status;
        }

        return $budgets;
    }

}
