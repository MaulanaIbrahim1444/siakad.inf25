<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    protected $table = 'tbl_sekolah';
    protected $primaryKey = 'id_sekolah';

    public function DetailData()
    {
        return $this->db->table('tbl_kampus')
            ->where('id', 1)
            ->get()
            ->getRowArray();
    }
}
