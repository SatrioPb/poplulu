<?php

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load necessary models or libraries
        $this->load->model('M_barang', 'm_barang');
        $this->load->model('M_customer', 'm_customer');
        $this->load->model('M_cart', 'm_cart');
        $this->load->library('cart'); // Load the Cart library
        $this->load->helper('cart');

    }

    // Cart.php

    // Cart.php

    public function add_to_cart($kd_barang)
    {
        // Check if the customer is logged in
        if ($this->session->userdata('login')) {
            // Retrieve customer information from the session
            $customer_info = $this->session->userdata('login');
            $user_id = $customer_info['user_id'];

            // Get product details from the model based on $kd_barang
            $product = $this->m_barang->getProductByCode($kd_barang);

            // Check if the product exists
            if ($product) {
                // Get the manually input date and time from URL parameters
                $selectedDate = $this->input->get('date');
                $selectedTime = $this->input->get('time');

                // Combine date and time to create a timestamp (if needed)
                $timestamp = strtotime($selectedDate . ' ' . $selectedTime);

                // Add the product to the cart with the manually input date and time
                $data = array(
                    'user_id'       => $user_id,
                    'product_id'    => $product->id,
                    'quantity'      => 1,
                    'price'         => $product->harga,
                    'gambar'        => $product->gambar,
                    'selected_date' => $selectedDate,
                    'selected_time' => $selectedTime,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                );

                // Insert data into the cart table
                $this->m_cart->add_to_cart($data);

                // Redirect to the cart page or product details page
                redirect('cart/show_cart');
            } else {
                // Handle the case where the product is not found
                $this->session->set_flashdata('error', 'Product not found.');
                redirect('home');
            }
        } else {
            // Handle the case where the customer is not logged in
            redirect('login_customer');
        }
    }




    public function show_cart()
    {
        // Get the user's cart items
        $user_id = $this->session->userdata('login')['user_id'];
        $data['cart_items'] = $this->m_cart->get_cart_items($user_id);

        // Load the view to display the cart items
        $this->load->view('landingpage/cart', $data);
    }
  

    public function remove_item($id)
    {
        // Check if the customer is logged in
        if ($this->session->userdata('login')) {
            // Retrieve customer information from the session
            $customer_info = $this->session->userdata('login');
            $user_id = $customer_info['user_id'];

            // Debugging: Check if user_id is correctly retrieved
            echo "User ID: " . $user_id;

            // Remove the specified item from the cart
            $removed = $this->m_cart->remove_cart_item($id, $user_id);

            if ($removed) {
                // Update the total price in the cart
                $this->cart->update();
                $this->session->set_flashdata('success', 'Item removed from cart successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to remove item from cart.');
            }

            // Redirect back to the cart page
            redirect('cart/show_cart');
        } else {
            // Handle the case where the customer is not logged in
            redirect('login_customer'); // Redirect to the login page or display an error message
        }
    }
    public function clear_cart($user_id)
    {
        // Clear the user's cart in the database
        $this->db->where('user_id', $user_id);
        $this->db->delete('cart');
    

    }
    // Cart.php
    public function create_order($order_data)
    {
        // Insert order data into the orders table
        $this->db->insert('orders', $order_data);

        // Check if the order is successfully created
        if ($this->db->affected_rows() > 0) {
            // Get the user's cart items
            $user_id = $order_data['user_id'];
            $cart_items = $this->m_cart->get_cart_items($user_id);

            // Get the order ID of the newly created order
            $order_id = $this->db->insert_id();

            // Insert each cart item into order_items table
            foreach ($cart_items as $item) {
                $order_item_data = array(
                    'order_id'      => $order_id,
                    'product_id'    => $item->product_id,
                    'quantity'      => $item->quantity,
                    'price'         => $item->price,
                    'selected_date' => $item->selected_date, // Retrieve selected date from cart item
                    'selected_time' => $item->selected_time, // Retrieve selected time from cart item
                );

                $this->db->insert('order_items', $order_item_data);
            }

            // Clear the user's cart
            $this->m_cart->clear_cart($user_id);

            return true;
        } else {
            // Handle the case where order creation failed
            return false;
        }
    }



    // Add more methods as needed, e.g., update_cart_item, remove_from_cart, etc.
}
