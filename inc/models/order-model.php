<?php
class Order_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add_order(array $order_info)
    {
        $orders_options = [
            ':payment_method' => $order_info["payment-method"],
            ':delivery_method' => $order_info["delivery-method"],
            ':total_price' => $order_info["total-price"],
            ':first_name' => $order_info["first-name"],
            ':last_name' => $order_info["last-name"],
            ':email' => $order_info["email"],
            ':client_address' => $order_info["address"],
            ':notes' => isset($order_info["notes"]) ? $order_info["notes"] : NULL,
        ];

        $sql = "INSERT INTO `orders` (`first_name`, `last_name`, `email`, `address`, `notes`, `payment_method`, `delivery_method`, `total_price` ) 
        VALUES (:first_name, :last_name, :email, :client_address, :notes, :payment_method, :delivery_method, :total_price )";

        $statement = $this->pdo->prepare($sql);
        $statement->execute($orders_options);
        return $this->pdo->lastInsertId();
    }

    public function add_order_products_info(array $order_products_info, int $order_id)
    {
        $no_has_error = true;
        foreach ($order_products_info as $products_id => $product_count) {
            $orders_options = [
                ':order_id' => $order_id,
                ':product_id' => $products_id,
                ':count_of_product' => $product_count,
            ];

            $sql = "INSERT INTO `order_items` (`order_id`, `count_of_product`, `product_id` ) 
            VALUES (:order_id, :count_of_product, :product_id )";
            $statement = $this->pdo->prepare($sql);
            $statement->execute($orders_options);
            if (!$this->pdo->lastInsertId()) {
                $no_has_error = false;
            }
        }

        return $no_has_error;
    }

    public function get_products_ids()
    {
        return $_SESSION['product_ids'] ? $_SESSION['product_ids'] : [];
    }

    public function get_order($order_id)
    {
        $sql = "SELECT * FROM `orders` WHERE order_id = :order_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function get_order_detail($order_id)
    {
        $sql = "SELECT order_items.*, products.product_cost
        FROM order_items
        JOIN products ON order_items.product_id = products.product_id
        WHERE order_items.order_id = :order_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    


}
?>