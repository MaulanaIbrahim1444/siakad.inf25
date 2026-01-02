<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_prodi')->get()->getResultArray();
    }

}