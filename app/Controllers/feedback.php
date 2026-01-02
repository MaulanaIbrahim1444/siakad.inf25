<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Feedback extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Umpan Balik Pengguna',
            'menu'  => 'dashboard',
            'page'  => 'feedback/v_form',
        ];

        return view('v_template_admin', $data);
    }

    public function simpan()
    {
        $data = [
            'nama'          => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jk'),
            'keluhan'       => implode(', ', $this->request->getPost('keluhan') ?? []),
            'keterangan'    => $this->request->getPost('keterangan'),
        ];

        // upload foto
        $foto = $this->request->getFile('foto');
        if ($foto && $foto->isValid()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/feedback', $namaFoto);
            $data['foto'] = $namaFoto;
        }

        // sementara dump dulu
        return redirect()->back()->with('success', 'Terima kasih atas umpan balik Anda');
    }
}
