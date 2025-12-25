<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model {
    protected $table = 'transaksi';
    protected $primaryKey = 'transaksi_id';
    protected $allowedFields = ['user_id', 'dompet_id', 'kategori_id', 'nominal', 'type', 'transaction_at', 'note', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}