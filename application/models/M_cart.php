<?php

// M_cart.php

class M_cart extends CI_Model
{
    protected $_table = 'cart';

    public function add_to_cart($data)
    {
        try {
            // Debugging: Check if data is received by the model
            var_dump($data);

            // Insert data into the cart table
            $result = $this->db->insert($this->_table, $data);

            // Debugging: Check if the insertion was successful
            var_dump($result);

            return $result;
        } catch (Exception $e) {
            log_message('error', 'Error in M_cart model: ' . $e->getMessage());
            return false;
        }
    }


    public function get_cart_items($user_id)
    {
        $this->db->select('cart.*, barang.nama_barang');
        $this->db->from($this->_table);
        $this->db->join('barang', 'barang.id = cart.product_id');
        $this->db->where('cart.user_id', $user_id);
        return $this->db->get()->result();
    }



    public function remove_cart_item($id, $user_id)
    {
        try {
            // Get the cart item based on rowid and user_id
            $cart_item = $this->db
                ->where('id', $id)
                ->where('user_id', $user_id)
                ->get($this->_table)
                ->row();

            if ($cart_item) {
                // Remove the item from the cart
                $result = $this->cart->remove($id);

                if ($result) {
                    // Also remove the item from the database
                    $this->db->where('id', $id)->delete($this->_table);
                }

                return $result;
            }

            return false;
        } catch (Exception $e) {
            log_message('error', 'Error in M_cart model: ' . $e->getMessage());
            return false;
        }
    }

    // Fungsi untuk membersihkan keranjang belanja
    public function clear_cart($user_id)
    {
        // Sesuaikan nama tabel dan kolom pada database Anda
        $this->db->where('user_id', $user_id);
        $this->db->delete('cart'); // Gantilah 'your_cart_table' dengan nama tabel keranjang belanja Anda
    }
}
