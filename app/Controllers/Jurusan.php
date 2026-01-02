<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
    protected $ModelJurusan;

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
            'judul'    => 'Jurusan',
            'subjudul' => '',
            'menu'     => 'master-data',
            'submenu'  => 'jurusan',
            'page'     => 'jurusan/v_index',
        ];

        return view('v_template_admin', $data);
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
