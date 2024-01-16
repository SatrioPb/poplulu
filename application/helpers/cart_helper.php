<?php
// application/helpers/cart_helper.php
defined('BASEPATH') or exit('No direct script access allowed');

function calculate_total_price($cart_items)
{
    $total_price = 0;
    foreach ($cart_items as $item) {
        // Ubah objek stdClass menjadi array
        $item = (array) $item;
        $total_price += $item['price'] * $item['quantity'];
    }
    return $total_price;
}

