<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRuang;

class Ruang extends BaseController
{
    protected $ModelRuang;

    public function __construct()
    {
        $this->ModelRuang = model('ModelRuang');
    }


    

    public function index()
    {
         $data = [
            'judul'    => 'Master Data',
            'subjudul' => 'Ruang',
            'menu'     => 'master-data',
            'submenu'  => 'Ruangan',
            'page'     => 'v_ruang',
            'ruang'  => $this->ModelRuang->AllData(),
        ];

        return view('v_template_admin', $data);
    }

     public function InsertData()
    {

            $data = [
                'kode_ruang' => $this->request->getPost('kode_ruang'),
                'nama_ruang' => $this->request->getPost('nama_ruang'),
                
            ];
            $this->ModelRuang->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan!!!');
             return redirect()->to('Ruang')->withInput(); 

    }
    public function UpdateData($id_ruang)
    {

            $data = [
                "id_ruang" => $id_ruang,
                'kode_ruang' => $this->request->getPost('kode_ruang'),
                'nama_ruang' => $this->request->getPost('nama_ruang'),
                
            ];
            $this->ModelRuang->UpdateData($id_ruang, $data);
            session()->setFlashdata('update', 'Data Berhasil Diubah!!!');
             return redirect()->to('Ruang')->withInput(); 

    }
   
    public function DeleteData($id_ruang)
    {
            $data = [
                "id_ruang" => $id_ruang,
                
            ];
            $this->ModelRuang->DeleteData($id_ruang);
            session()->setFlashdata('delete', 'Data Berhasil Dihapus!!!');
             return redirect()->to('Ruang')->withInput(); 

    }

}