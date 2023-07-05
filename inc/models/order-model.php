<?php
class Cart_Model
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
                ':product_count' => $product_count,
                ':products_id' => $products_id,
            ];

            $sql = "INSERT INTO `order_items` (`product_count`, `products_id` ) 
            VALUES (:product_count, :products_id )";
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
        return $_SESSION['product_ids'] ? $_SESSION['product_ids'] : false;
    }
    
    public function send_notification_to_email(array $order_details) {
        $to = "xyz@somedomain.com";
        $subject = "This is subject";
        
        $message = "<b>This is HTML message.</b>";
        $message .= "<h1>This is headline.</h1>";
        
        $header = "From:abc@somedomain.com \r\n";
        $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        
        $retval = mail ($to,$subject,$message,$header);
        
        if( $retval == true ) {
           echo "Message sent successfully...";
        } else {
           echo "Message could not be sent...";
        }
        // TODO: Зроби норм і налаштуй mail server, подумай чи це може в контроллері треба

    }
}
?>