<?php
class Cart_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function delete_product_from_cart($product_id)
    {
        $index = array_search($product_id, $_SESSION['product_ids']);
        if ($index !== false) {
            unset($_SESSION['product_ids'][$index]);
        }
    }

    public function increase_product_quantity($product_id, $quantity)
    {
        if ($product_id) {
            $_SESSION["products_quantities"][$product_id] = $quantity;
        } else {
            Errors::add_error('Product_id is not found');
        }


    }
    public function add_product_to_cart($product_id)
    {
        if (!isset($_SESSION['product_ids'])) {
            $_SESSION['product_ids'] = [];
        }
        array_push($_SESSION['product_ids'], $product_id);
    }

    public function get_products_ids()
    {
        return $_SESSION['product_ids'] ? implode(',', $_SESSION['product_ids']) : false;
    }

    public function is_cart_empty()
    {
        return count($_SESSION['product_ids']) == 0;
    }






    public function post_order(array $order_details)
    {
        $orders_options = [
            ':payment_method' => $order_details["payment-method"],
            ':delivery_method' => $order_details["delivery-method"],
            ':total_price' => $order_details["total-price"],
            ':products_ids' => $order_details["product-ids"],
            ':count_of_products' => $order_details["product-count"],
            ':first_name' => $order_details["first-name"],
            ':last_name' => $order_details["last-name"],
            ':email' => $order_details["email"],
            ':client_address' => $order_details["address"],
            ':notes' => isset($order_details["notes"]) ? $order_details["notes"] : NULL,
        ];

        $sql = "INSERT INTO `orders` (`first_name`, `last_name`, `email`, `address`, `notes`, `count_of_products`, `payment_method`, `delivery_method`, `products_ids`, `total_price` ) 
        VALUES (:first_name, :last_name, :email, :client_address, :notes, :count_of_products, :payment_method, :delivery_method, :products_ids, :total_price )";

        $statement = $this->pdo->prepare($sql);
        return $statement->execute($orders_options);
    }


}