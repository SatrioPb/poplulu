<?php
class Lihat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load any necessary models or libraries
        $this->load->model('M_barang', 'm_barang');
     
    }

    public function index($kode_barang)
    {
        // Load data from the model based on $kode_barang
        $data['product'] = $this->m_barang->getProductByCode($kode_barang);
        $data['all_barang'] = $this->m_barang->lihat();
        // Load the view and pass the data
        $this->load->view('landingpage/lihat', $data);
    }
}

