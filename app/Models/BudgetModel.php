<?php

namespace App\Models;
use CodeIgniter\Model;

class BudgetModel extends Model {
    protected $table = 'budget';
    protected $primaryKey = 'budget_id';
    protected $allowedFields = ['user_id', 'kategori_id', 'nama_budget', 'target_amount', 'target_date', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}