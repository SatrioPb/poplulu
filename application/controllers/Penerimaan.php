<?php

use Dompdf\Dompdf;

class Penerimaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->data['aktif'] = 'penerimaan';
		$this->load->model('M_barang', 'm_barang');
		$this->load->model('M_customer', 'm_customer');
		$this->load->model('M_cart', 'm_cart');
		$this->load->model('M_order', 'm_order');
		$this->load->library('cart');
		$this->load->helper('cart');
		// Load the M_order model
		$this->load->model('M_order', 'm_order');
	}

	public function index()
	{

		$this->load->view('penerimaan/lihat', $this->data);
	}
	public function order_detail_admin()
	{
		// Get order details for admin
		$this->data['order_detail_admin'] = $this->m_order->getOrderDetailsForAdmin();

		// Load the order_detail view for admin
		$this->load->view('penerimaan/lihat', $this->data);
	}
	
}
