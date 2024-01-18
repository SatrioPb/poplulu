<?php

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_customer', 'm_customer');
        $this->load->model('M_cart', 'm_cart');
        $this->load->model('M_order', 'm_order');
        $this->load->library('cart');
        $this->load->helper('cart');
    }

    public function index()
    {
        // Get the user's cart items
        $user_id = $this->session->userdata('login')['user_id'];
        $data['cart_items'] = $this->m_cart->get_cart_items($user_id);

        // Load the checkout view
        $this->load->view('landingpage/checkout', $data);
    }

    public function process_checkout()
    {
        // Get user ID from session
        $user_id = $this->session->userdata('login')['user_id'];
        // Get cart items
        $cart_items = $this->m_cart->get_cart_items($user_id);
        $selectedDate = $cart_items[0]->selected_date;
        $selectedTime = $cart_items[0]->selected_time;
        $foto = $_FILES['bukti_pembayaran']['name'];
        $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];
        move_uploaded_file($file_tmp, 'bukti/' . $foto);
        $payment_method = $this->input->post('metode_pembayaran');
        $payment_proof = $foto;
        // Prepare order data
        $order_data = array(
            'user_id' => $user_id,
            'status' => 'diproses',
            'total_amount' => $this->cart->total(),
            'order_date' => date('Y-m-d H:i:s'),
            'pembayaran' => $payment_method,
            'bukti' => $payment_proof,
            // Add more order details as needed
        );

        // Create the order in the database using the M_order model
        $order_created = $this->m_order->create_order($order_data);

        if ($order_created) {
            // Get the order ID of the newly created order
            $order_id = $this->db->insert_id();

            // Insert each cart item into order_items table
            foreach ($cart_items as $item) {
                $order_item_data = array(
                    'order_id' => $order_id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'selected_date' => $item->selected_date, // Retrieve selected date from cart item
                    'selected_time' => $item->selected_time,
                    // Add more order item details as needed
                );

                $this->db->insert('order_items', $order_item_data);
            }

            // Clear the user's cart
            $this->m_cart->clear_cart($user_id);

            // Redirect to a thank you page or order confirmation page
            redirect('success');
        } else {
            // Handle the case where order creation failed
            $this->session->set_flashdata('error', 'Order creation failed.');
            redirect('checkout');
        }
    }



    public function order_detail()
    {
        // Get the user's order items
        $user_id = $this->session->userdata('login')['user_id'];
        $data['order_items'] = $this->m_order->getOrdersByUserId($user_id);

        // Load the order_detail view
        $this->load->view('landingpage/order_detail', $data);
    }
}
