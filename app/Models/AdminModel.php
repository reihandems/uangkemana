<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model {
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $allowedFields = ['email', 'password', 'nama_admin', 'gambar', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}