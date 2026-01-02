<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'tbl_user'; // ⬅️ WAJIB (sesuaikan nama tabel kamu)
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'nama_user', 'level'];

    public function loginUser($username, $password)
    {
        return $this->where('username', $username)
                    ->where('password', $password)
                    ->first();
    }
}
