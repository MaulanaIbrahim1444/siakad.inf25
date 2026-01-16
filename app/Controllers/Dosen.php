<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDosen;

class Dosen extends BaseController
{
    protected $ModelDosen;
    public function __construct()
    {
        $this->ModelDosen = new ModelDosen();
    }


    public function index()
    {
        $data = [
            'judul'    => 'Master Data',
            'subjudul' => 'Dosen',
            'menu'     => 'master-data',
            'submenu'  => 'dosen',
            'page'     => 'dosen/v_index',
            'dosen'    => $this->ModelDosen->AllData(),
        ];

        return view('v_template_admin', $data);
    }

    public function insert()
{
    $foto = $this->request->getFile('foto');
    $namaFoto = null;

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $namaFoto = $foto->getRandomName();
        $foto->move('uploads/dosen', $namaFoto);
    }

    $data = [
        'kode_dosen' => $this->request->getPost('kode_dosen'),
        'nidn' => $this->request->getPost('nidn'),
        'nama_dosen' => $this->request->getPost('nama_dosen'),
        'jk' => $this->request->getPost('jk'),
        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
        'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
        'email' => $this->request->getPost('email'),
        'foto' => $namaFoto,
    ];

    $this->ModelDosen->insert($data);

    return redirect()->to(base_url('dosen'))
        ->with('success', 'Data dosen berhasil ditambahkan');
}
    public function updateFoto($id_dosen)
    {
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/dosen', $namaFoto);
        }

        $data = [
            'foto' => $namaFoto,
        ];

        $this->ModelDosen->update($id_dosen, $data);

        return redirect()->to(base_url('dosen'))
            ->with('success', 'Foto dosen berhasil diupdate');
    }

    

    public function Edit($id_dosen)
    {
        $data = [
            'judul'   => 'Edit Dosen',
            'subjudul'=> 'Edit Data Dosen',
            'dosen'   => $this->ModelDosen->DetailData($id_dosen)
        ];

        return view('dosen/v_edit', $data);
    }

    public function DeleteData($id_dosen)
    {
        $this->ModelDosen->DeleteData($id_dosen);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('dosen'));
    }
}

