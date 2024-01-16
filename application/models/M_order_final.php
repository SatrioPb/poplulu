<?php

class M_order_final extends CI_Model
{
    protected $_table = 'order_final';

    public function insert_order_final($data)
    {
        // Insert order_final data into the order_final table
        return $this->db->insert_batch('order_final', $data);
    }
}
