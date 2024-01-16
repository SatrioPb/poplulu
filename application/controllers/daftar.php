<?php

use Dompdf\Dompdf;

class daftar extends CI_Controller
{
   

    public function proses_tambah()
    {
        if ($this->session->login['role'] == 'petugas') {
            $this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
            redirect('dashboard');
        }

        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
        ];

        if ($this->m_pengguna->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Pengguna <strong>Berhasil</strong> Ditambahkan!');
            redirect('pengguna');
        } else {
            $this->session->set_flashdata('error', 'Data Pengguna <strong>Gagal</strong> Ditambahkan!');
            redirect('pengguna');
        }
    }

   
}
