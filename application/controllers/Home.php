<?php
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load any necessary models or libraries
		$this->load->model('M_barang', 'm_barang');
	}

	public function index()
	{
		// Load data from the model
		$data['all_barang'] = $this->m_barang->lihat();

		// Load the view and pass the data
		$this->load->view('landingpage/home', $data);
	}
}
