<?php
class M_order extends CI_Model
{
    protected $_table = 'orders';

    // M_order.php

    public function create_order($data)
    {
        // Insert order data into the orders table
        return $this->db->insert('orders', $data);
    }

    public function getOrdersByUserId($user_id)
    {
        $this->db->select('order_items.*, barang.nama_barang, orders.order_date, orders.status');
        $this->db->from('order_items');
        $this->db->join('barang', 'barang.id = order_items.product_id');
        $this->db->join('orders', 'orders.order_id = order_items.order_id');
        $this->db->where('orders.user_id', $user_id);
        $this->db->order_by('orders.order_date', 'DESC'); // Order by order_date in descending order

        $query = $this->db->get();

        return $query->result();
    }

    public function getCustomerDetails($order_id)
    {
        $this->db->select('orders.order_id, orders.user_id, orders.order_date, order_items.product_id, order_items.selected_date, order_items.selected_time,customer.nama,orders.bukti, order_items.price,orders.status, barang.nama_barang,customer.telepon');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.order_id');
        $this->db->join('barang', 'barang.id = order_items.product_id');
        $this->db->join('customer', 'customer.user_id = orders.user_id');
        $this->db->where('orders.order_id', $order_id);
        $query = $this->db->get();

        // Check if a row exists
        if ($query->num_rows() > 0) {
            // Return customer details
            return $query->row_array();
        }

        // Return null if no record found
        return null;
    }



    public function getOrderDetailsForAdmin()
    {
        $this->db->select('orders.order_id, orders.user_id, orders.order_date, order_items.product_id, order_items.selected_date, order_items.selected_time,customer.nama,orders.bukti, order_items.price,orders.status, barang.nama_barang');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.order_id');
        $this->db->join('barang', 'barang.id = order_items.product_id');
        $this->db->join('customer', 'customer.user_id = orders.user_id');
        $this->db->group_by('orders.order_id');  // Group by order.id

        $query = $this->db->get();

        return $query->result();
    }
    public function updateOrderStatus($order_id, $status)
    {
        // Update the status in the database
        $this->db->set('status', $status);
        $this->db->where('order_id', $order_id);
        $this->db->update('orders');
    }
}
