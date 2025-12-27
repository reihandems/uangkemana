<?php

namespace App\Models;

use CodeIgniter\Model;

class BudgetModel extends Model
{
    protected $table = 'budget';
    protected $primaryKey = 'budget_id';

    protected $allowedFields = [
        'user_id',
        'kategori_id',
        'limit_amount',
        'bulan'
    ];

    protected $useTimestamps = true;
}
