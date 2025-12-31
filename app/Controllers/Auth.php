<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSekolah;

class Auth extends BaseController
{
    protected ModelSekolah $modelSekolah;

    public function __construct()
    {
        $this->modelSekolah = new ModelSekolah();
    }

    public function index()
    {
        $data = [
            'judul' => 'Login',
            'subjudul' => '',
            'web' => $this->modelSekolah->DetailData(),
        ];

        return view('v_login', $data);
    }
}
