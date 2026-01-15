<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;
use App\Models\ModelFakultas;

class Jurusan extends BaseController
{
    protected $ModelJurusan;
    protected $modelFakultas;

    public function __construct()
    {
        $this->ModelJurusan = new ModelJurusan();
    }

    // =============================
    // KODE LAMA (JANGAN DIUBAH)
    // =============================
    public function index()
    {
        $data = [
            'judul'    => 'Master Data',
            'subjudul' => 'Jurusan',
            'menu'     => 'master-data',
            'submenu'  => 'jurusan',
            'page'     => 'jurusan/v_index',
            'jurusan'  => $this->ModelJurusan->AllData(),
        ];

        return view('v_template_admin', $data);
    }
    public function input()
    {
        $data = [
            'judul'    => 'Jurusan',
            'subjudul' => 'Input Jurusan',
            'menu'     => 'master-data',
            'submenu'  => 'jurusan',
            'page'     => 'jurusan/v_input',
            'jurusan'  => $this->ModelJurusan->AllData(),
        ];

        return view('v_template_admin', $data);

    }

    public function InsertData()
    {
         if ($this->validate([
          'id_prodi' => [
            'labels' => 'Id Prodi',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Diisi',     
              ]
         ],

         'kode_prodi' => [
            'labels' => 'Kode Prodi',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Diisi',     
              ]
         ],

         'nama_prodi' => [
            'labels' => 'Nama Prodi',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Diisi',     
              ]
         ],

         'Visi_Misi' => [
            'label' => 'Visi Misi',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajib Diisi',
            ],
        ],

         ])) {

            $data = [
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'nama_prodi' => $this->request->getPost('nama_prodi'),
                'Visi_Misi' => $this->request->getPost('Visi_Misi'),
            ];
            $this->ModelJurusan->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan!!!');
             return redirect()->to('Jurusan')->withInput(); 

        } else {
            return redirect()->to('Jurusan/Input')->withInput(); 
        }
    }

    public function Edit($id_prodi)
    {
        $data = [
            'judul'    => 'Jurusan',
            'subjudul' => 'Edit Jurusan',
            'menu'     => 'master-data',
            'submenu'  => 'jurusan',
            'page'     => 'jurusan/v_edit',
            'jurusan'  => $this->ModelJurusan->DetailData($id_prodi),
        ];

        return view('v_template_admin', $data);

    }

    public function UpdateData($id_prodi)
    {
         if ($this->validate([
          'id_prodi' => [
            'labels' => 'Id Prodi',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Diisi',     
              ]
         ],

         'kode_prodi' => [
            'labels' => 'Kode Prodi',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Diisi',     
              ]
         ],

         'nama_prodi' => [
            'labels' => 'Nama Prodi',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Diisi',     
              ]
         ],

         'Visi_Misi' => [
            'label' => 'Visi Misi',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajib Diisi',
            ],
        ],


         ])) {

            $data = [
                'id_prodi' => $id_prodi,
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'nama_prodi' => $this->request->getPost('nama_prodi'),
                'Visi_Misi' => $this->request->getPost('Visi_Misi'),
            ];
            $this->ModelJurusan->UpdateData($id_prodi, $data);

            session()->setFlashdata('update', 'Data Berhasil Diubah!');
            return redirect()->to(base_url('Jurusan'));

        } else {
            return redirect()->back()->withInput();
        }
    }

    public function delete($id_prodi)
{
    $this->ModelJurusan->DeleteData($id_prodi);
    return redirect()->to(base_url('Jurusan'))->with('delete', 'Data Berhasil Dihapus!');
}



    // =============================
    // KODE BARU (MATCHING JURUSAN)
    // =============================
    public function matching()
    {
        $data = [
            'judul'    => 'Matching Jurusan',
            'subjudul' => 'Kuesioner Minat',
            'menu'     => 'tugas',
            'submenu'  => 'matching-jurusan',
            'page'     => 'jurusan/v_kuesioner',
            
        ];

        return view('v_template_admin', $data);
    }

    public function prosesMatching()
    {
        $q1  = $this->request->getPost('question1');
        $q3A = $this->request->getPost('question3A');

        $rekomendasi = '-';

        if ($q1 === 'A') {
            $rekomendasi = ($q3A === 'Ya')
                ? 'Informatika'
                : 'Farmasi / Manajemen';
        } elseif ($q1 === 'B') {
            $rekomendasi = 'Akuntansi / Manajemen';
        }

        $data = [
            'judul'       => 'Hasil Matching Jurusan',
            'subjudul'    => '',
            'menu'        => 'tugas',
            'submenu'     => 'matching-jurusan',
            'rekomendasi' => $rekomendasi,
            'page'        => 'jurusan/v_hasil',
        ];

        return view('v_template_admin', $data);
    }
}
