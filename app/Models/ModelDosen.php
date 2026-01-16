<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{
    protected $table = 'tbl_dosen';
protected $primaryKey = 'id_dosen';
protected $allowedFields = [
    'kode_dosen',
    'nidn',
    'nama_dosen',
    'jk',
    'tgl_lahir',
    'pendidikan_terakhir',
    'email',
    'foto'
];


    public function AllData()
    {
        return $this->db->table('tbl_dosen')
            ->orderBy('ID_dosen', 'DESC')
            ->get()->getResultArray();
    }

    public function insertData()
    {
        $data = [
            'kode_dosen'           => $this->request->getPost('kode_dosen'),
            'nidn'                 => $this->request->getPost('nidn'),
            'nama_dosen'           => $this->request->getPost('nama_dosen'),
            'jk'                   => $this->request->getPost('jk'),
            'tgl_lahir'            => $this->request->getPost('tgl_lahir'),
            'pendidikan_terakhir'  => $this->request->getPost('pendidikan_terakhir'),
            'email'                => $this->request->getPost('email'),
            'foto'                 => $this->request->getPost('foto'),
        ];

        $this->db->table('tbl_dosen')->insert($data);
        return redirect()->to(base_url('dosen'))->with('pesan', 'Data berhasil ditambahkan');
    }
    public function updateFoto($id_dosen)
    {
        $data = [
            'foto' => $this->request->getPost('foto'),
        ];

        $this->db->table('tbl_dosen')
            ->where('id_dosen', $id_dosen)
            ->update($data);
        return redirect()->to(base_url('dosen'))->with('pesan', 'Foto berhasil diupdate');
    }

     public function DetailData($id_dosen)
    {
        return $this->db->table('tbl_dosen')->where(['id_dosen' => $id_dosen])
        ->get()->getRowArray();
    
    }

    public function UpdateData($id_dosen, $data)
{
    return $this->db->table('tbl_dosen')
        ->where('id_dosen', $id_dosen)
        ->update($data);
}


    public function DeleteData($id)
{
    return $this->db->table('tbl_dosen')
        ->where('id_dosen', $id)
        ->delete();
}

}