<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSekolah;
use App\Models\ModelAuth;


class Auth extends BaseController
{
    protected ModelSekolah $modelSekolah;
    protected ModelAuth $modelAuth;

    public function __construct()
    {
        $this->modelSekolah = new ModelSekolah();
        $this->modelAuth = new ModelAuth();
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

    public function cekLogin()
{
    if ($this->validate([
        'username' => 'required',
        'level'    => 'required',
        'password' => 'required',
    ])) {

        $username = $this->request->getPost('username');
        $level    = $this->request->getPost('level');
        $password = sha1($this->request->getPost('password'));

        if ($level == 1) {
            $cek = $this->modelAuth->LoginUser($username, $password);

            if ($cek) {
                session()->set([
                    'logged_in' => true, 
                    'level'     => $level,
                    'username'  => $cek['username'],
                    'nama_user' => $cek['nama_user'],
                ]);

                return redirect()->to(base_url('dashboardadmin'));
;
            } else {
                session()->setFlashdata('pesan', 'Username atau Password Salah');
                return redirect()->to('Auth');
            }
        } else {
            session()->setFlashdata('pesan', 'Level tidak valid');
            return redirect()->to('Auth');
        }

    } else {
        return redirect()->to('Auth')->withInput();
    }
}
public function logout()
{
   session()->destroy();
   return redirect()->to('Auth');

}
}