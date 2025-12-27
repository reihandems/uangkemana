<?php

namespace App\Models;
use CodeIgniter\Model;

class DompetModel extends Model {
    protected $table = 'dompet';
    protected $primaryKey = 'dompet_id';
    protected $allowedFields = ['user_id', 'nama_dompet', 'saldo', 'currency',];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}