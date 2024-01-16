<?php
class Order_detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load any necessary models or libraries
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_customer', 'm_customer');
        $this->load->model('M_cart', 'm_cart');
        $this->load->model('M_order', 'm_order');
        $this->load->library('cart');
        $this->load->helper('cart');
    }

    public function index()
    {
        // Get the user's order items
        $user_id = $this->session->userdata('login')['user_id'];
        $data['order_items'] = $this->m_order->getOrdersByUserId($user_id);

        // Load the order_detail view
        $this->load->view('landingpage/order_detail', $data);
    }
}
