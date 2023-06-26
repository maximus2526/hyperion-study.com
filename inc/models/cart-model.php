<?php
class Cart_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function post_order(array $order_details, array $client_info)
    {
        $clients_info_options = [
            ':first_name' => $client_info["first_name"],
            ':last_name' => $client_info["last_name"],
            ':email' => $client_info["email"],
            ':client_address' =>  $client_info["address"],
            ':notes' => isset($client_info["notes"]) ? $client_info["notes"] : NULL,
        ];
        $sql = "INSERT INTO `clients_info` (`payment_method`, `delivery_method`, `products_ids`, `total_price`) VALUES (:first_name, :last_name, :email, :client_address, :notes)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($clients_info_options); 
        $client_info_id = $statement->lastInsertId();

        $orders_options = [
            ':client_info_id' => $client_info_id,
            ':payment_method' => $order_details["payment_method"],
            ':delivery_method' => $order_details["delivery_method"],
            ':products_ids' => $order_details["products_ids"],
            ':total_price' =>  $order_details["total_price"],
        ];
        $sql = "INSERT INTO `orders` (`client_info_id`, `payment_method`, `delivery_method`, `products_ids`, `total_price`) VALUES (:client_info_id, :payment_method, :delivery_method, :products_ids, :total_price )";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($orders_options); 
    }

}


