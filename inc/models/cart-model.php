<?php
class Cart_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function get_total_price($products)
    {
        foreach ($products as $product) {
            $total_price += $product['product_cost'];
        }
        return $total_price;
    }
    public function delete($product_id)
    {
        $index = array_search($product_id, $_SESSION['product_ids']);
        if ($index !== false) {
            unset($_SESSION['product_ids'][$index]);
        }
    }

    public function increase_quantity($product_id, $quantity)
    {
        if ($product_id) {
            $_SESSION["products_quantities"][$product_id] = $quantity;
        } else {
            Errors::add_error('Product_id is not found');
        }


    }
    public function add($product_id)
    {
        if (!in_array($product_id, $_SESSION['product_ids'])) {
            if (!isset($_SESSION['product_ids'])) {
                $_SESSION['product_ids'] = [];
            }
            array_push($_SESSION['product_ids'], $product_id);
        } else {
            Errors::add_error("Product is already in the cart.");
        }
    }



    public function is_cart_empty()
    {
        return count($_SESSION['product_ids']) == 0;
    }









}