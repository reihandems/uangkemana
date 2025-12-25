<?php

namespace App\Models;
use CodeIgniter\Model;

class KategoriModel extends Model {
    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $allowedFields = ['user_id', 'nama_kategori', 'type'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}