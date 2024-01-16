<?php
class success extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load any necessary models or libraries
        $this->load->model('M_barang', 'm_barang');
    }

    public function index()
    {
        // Load data from the model based on $kode_baran
        // Load the view and pass the data
        $this->load->view('landingpage/success');
    }
}
