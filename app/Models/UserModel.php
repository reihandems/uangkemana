<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['name', 'email', 'password', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    public function getUserByEmail($email)
    {
        return $this->db->table('users u')
            ->select('
                u.user_id,
                u.name,
                u.email,
                u.password,
                u.gambar
            ')
            ->where('u.email', $email)
            ->get()
            ->getRowArray();
    }
}