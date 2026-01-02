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
        // dd(session()->get()); // ini tidak akan pernah terpanggil
    }
}
