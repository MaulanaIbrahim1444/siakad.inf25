<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMatkul extends Model
{

    public function AllData()
    {
        return $this->db->table('tbl_matkul')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_matkul')->insert($data);
    }

    public function DetailData($id_matkul)
    {
        return $this->db->table('tbl_matkul')->where(['id_matkul' => $id_matkul])
        ->get()->getRowArray();
    
    }

    public function UpdateData($id_matkul, $data)
{
    return $this->db->table('tbl_matkul')
        ->where('id_matkul', $id_matkul)
        ->update($data);
}


    public function DeleteData($id)
{
    return $this->db->table('tbl_matkul')
        ->where('id_matkul', $id)
        ->delete();
}



    protected $table = 'tbl_matkul';
    protected $primaryKey = 'id_matkul';
    protected $allowedFields = [
        'kode_matkul',
        'nama_matkul',
        'sks',
        'semester',
        'prodi',
    ];

}
