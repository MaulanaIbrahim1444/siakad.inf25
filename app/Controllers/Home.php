<?php

namespace App\Controllers;
use App\Models\ModelJurusan;


class Home extends BaseController
{
    public $ModelJurusan;

    public function __construct()
    {
        $this->ModelJurusan = new ModelJurusan();
    }


    public function index()
    {
       $data = [
            'judul' => 'Home',
            'subjudul' => '',
            'page' => ('v_home')
        ];
        return view('v_template_front_end', $data);
    }
    public function AboutUs()
    {
       $data = [
            'judul' => 'About us',
            'subjudul' => '',
            'page' => ('frontEnd/v_about_us')
        ];
        return view('v_template_front_end', $data);
    }
    public function Jurusan()
    {
       $data = [
            'judul' => 'Jurusan',
            'subjudul' => '',
            'page' => ('frontEnd/v_jurusan')
        ];
        return view('v_template_front_end', $data);
    }
    public function DetailJurusan($id_prodi)
    {
       $data = [
            'judul' => 'Detail Jurusan',
            'subjudul' => '',
            'page' => ('frontEnd/v_detail_jurusan'),
            'jurusan' => $this->ModelJurusan->DetailData($id_prodi),
        ];
        return view('v_template_front_end', $data);
    }
}
