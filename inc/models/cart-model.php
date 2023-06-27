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

    public function post_order(array $order_details, array $client_info)
    {
        $clients_info_options = [
            ':first_name' => $client_info["first-name"],
            ':last_name' => $client_info["last-name"],
            ':email' => $client_info["email"],
            ':client_address' => $client_info["address"],
            ':notes' => isset($client_info["notes"]) ? $client_info["notes"] : NULL,
        ];
        $sql = "INSERT INTO `clients_info` (`first_name`, `last_name`, `email`, `address`, `notes`) VALUES (:first_name, :last_name, :email, :client_address, :notes)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($clients_info_options);
        $client_info_id = $this->pdo->lastInsertId();
        
        $orders_options = [
            ':client_info_id' => $client_info_id,
            ':payment_method' => $order_details["payment-method"],
            ':delivery_method' => $order_details["delivery-method"],
            ':total_price' =>  $order_details["total-price"],
            ':products_ids' => $order_details["product-ids"],
            ':count_of_products' => $order_details["product-count"],
        ];

        $sql = "INSERT INTO `orders` (`count_of_products`, `client_info_id`, `payment_method`, `delivery_method`, `products_ids`, `total_price`) VALUES (:count_of_products, :client_info_id, :payment_method, :delivery_method, :products_ids, :total_price )";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($orders_options);
        
        
    }


}


