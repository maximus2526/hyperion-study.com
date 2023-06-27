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

    public function add_product_to_cart()
    {
        if (isset($_GET['product-id'])) {
            if (empty($_SESSION['product_ids'])) {
                $_SESSION['product_ids'] = array();
            }
            if (!in_array($_GET['product-id'], $_SESSION['product_ids'])) {
                $product_id = (int) $_GET['product-id'];
                array_push($_SESSION['product_ids'], $product_id);
            } // else: product_count ++
        }
    }

    public function get_products_ids () {
        return implode(',', $_SESSION['product_ids']);
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
            ':notes' => isset($client_info["notes"]) ? $order_details["notes"] : NULL,
        ];

        $sql = "INSERT INTO `orders` (`first_name`, `last_name`, `email`, `address`, `notes`, `count_of_products`, `payment_method`, `delivery_method`, `products_ids`, `total_price` ) 
        VALUES (:first_name, :last_name, :email, :client_address, :notes, :count_of_products, :payment_method, :delivery_method, :products_ids, :total_price )";

        $statement = $this->pdo->prepare($sql);
        return $statement->execute($orders_options);
    }


}