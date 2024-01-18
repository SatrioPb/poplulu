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

			// Fetch the customer's details based on the order
			$customer_details = $this->m_order->getCustomerDetails($order_id);

			// Check if customer details are available
			if ($customer_details) {
				// Generate the WhatsApp message
				$whatsappMessage = $this->generateWhatsAppMessage($order_id, $status, $customer_details);

				// URL encode the message
				$encodedMessage = urlencode($whatsappMessage);

				// Generate the WhatsApp link
				$whatsappLink = "https://api.whatsapp.com/send?phone=$customer_details[telepon]&text=$encodedMessage";

				// Redirect to the WhatsApp link
				redirect($whatsappLink);
			} else {
				// Handle the case when no customer details are found
				echo "Customer details not found.";
			}
		}
	}

	private function generateWhatsAppMessage($order_id, $status, $customer_details)
	{
		// Extract customer details
		$customer_name = $customer_details['nama'];
		$order_item_price = $customer_details['price'];
		$nbarang = $customer_details['nama_barang'];

		// Compose the WhatsApp message
		$message = "Hi $customer_name,\n\n";
		$message .= "Pesanan Anda $nbarang di POPO-LULU Telah  $status.\n";
		$message .= "Dengan Harga: $order_item_price\n\n";
		$message .= "Thank you for trust with us!";

		return $message;
	}
}
