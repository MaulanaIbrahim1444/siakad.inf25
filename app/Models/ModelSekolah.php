<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    protected $table = 'tbl_kampus';   // nama tabel
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'alamat']; // sesuaikan kolom

    public function getData()
    {
        return $this->findAll();
    }

    public function DetailData()
    {
    return $this->first();
    }
}