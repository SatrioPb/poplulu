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
	public function update_status()
	{
		// Check if the form is submitted
		if ($this->input->post()) {
			// Get data from the form
			$order_id = $this->input->post('order_id');
			$status = $this->input->post('status');

			// Call a method in your model to update the status
			$this->load->model('M_order', 'm_order');
			$this->m_order->updateOrderStatus($order_id, $status);

			// Redirect to the page where the form was submitted
			redirect('penerimaan/order_detail_admin');
		}
	}
}
