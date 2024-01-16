<?php

class register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_customer');
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function proses_tambah()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'telepon' => $this->input->post('telepon'),
            'alamat' => $this->input->post('alamat'),
        ];

        if ($this->M_customer->tambah($data)) {
            $this->session->set_flashdata('success', 'Data Customer <strong>Berhasil</strong> Ditambahkan!');
            redirect('LoginCustomer');
        } else {
            $this->session->set_flashdata('error', 'Data Customer <strong>Gagal</strong> Ditambahkan!');
            redirect('LoginCustomer');
        }
    }
}
