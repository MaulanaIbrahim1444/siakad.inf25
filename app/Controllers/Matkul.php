<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMatkul;

class Matkul extends BaseController
{
    protected $ModelMatkul;
    public function __construct()
    {
        $this->ModelMatkul = model('ModelMatkul');
    }


    

    public function index()
    {
         $data = [
            'judul'    => 'Master Data',
            'subjudul' => 'Mata Kuliah',
            'menu'     => 'master-data',
            'submenu'  => 'Matkul',
            'page'     => 'v_matkul',
            'matkul'  => $this->ModelMatkul->AllData(),
        ];

        return view('v_template_admin', $data);
    }

     public function InsertData()
    {

            $data = [
                'kode_matkul' => $this->request->getPost('kode_matkul'),
                'nama_matkul' => $this->request->getPost('nama_matkul'),
                'sks' => $this->request->getPost('sks'),
                'semester' => $this->request->getPost('semester'),
                'prodi' => $this->request->getPost('prodi'),
                
            ];
            $this->ModelMatkul->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan!!!');
             return redirect()->to('Matkul')->withInput(); 

    }
    public function UpdateData($id_matkul)
    {

            $data = [
                "id_matkul" => $id_matkul,
                'kode_matkul' => $this->request->getPost('kode_matkul'),
                'nama_matkul' => $this->request->getPost('nama_matkul'),
                'sks' => $this->request->getPost('sks'),
                'semester' => $this->request->getPost('semester'),
                'prodi' => $this->request->getPost('prodi'),
                
            ];
            $this->ModelMatkul->UpdateData($id_matkul, $data);
            session()->setFlashdata('update', 'Data Berhasil Diubah!!!');
             return redirect()->to('Matkul')->withInput(); 

    }

    public function DeleteData($id_matkul)
    {
            $data = [
                "id_matkul" => $id_matkul,
                
            ];
            $this->ModelMatkul->DeleteData($id_matkul);
            session()->setFlashdata('delete', 'Data Berhasil Dihapus!!!');
             return redirect()->to('Matkul')->withInput(); 

    }

}