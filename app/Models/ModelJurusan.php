<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_prodi')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_prodi')->insert($data);
    }

    public function DetailData($id_prodi)
    {
        return $this->db->table('tbl_prodi')->where(['id_prodi' => $id_prodi])
        ->get()->getRowArray();
    
    }

    public function UpdateData($id_prodi, $data)
{
    return $this->db->table('tbl_prodi')
        ->where('id_prodi', $id_prodi)
        ->update($data);
}


    public function DeleteData($id)
{
    return $this->db->table('tbl_prodi')
        ->where('id_prodi', $id)
        ->delete();
}



    protected $table = 'tbl_prodi';
    protected $primaryKey = 'id_prodi';
    protected $allowedFields = [
        'id_fakultas',
        'kode_prodi',
        'nama_prodi'
    ];

}
