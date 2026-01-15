<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRuang extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_ruang')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_ruang')->insert($data);
    }

    public function DetailData($id_ruang)
    {
        return $this->db->table('tbl_ruang')->where(['id_ruang' => $id_ruang])
        ->get()->getRowArray();
    
    }

    public function UpdateData($id_ruang, $data)
{
    return $this->db->table('tbl_ruang')
        ->where('id_ruang', $id_ruang)
        ->update($data);
}


    public function DeleteData($id)
{
    return $this->db->table('tbl_ruang')
        ->where('id_ruang', $id)
        ->delete();
}



    protected $table = 'tbl_ruang';
    protected $primaryKey = 'id_ruang';
    protected $allowedFields = [
        'kode_ruang',
        'nama_ruang'
    ];

}
