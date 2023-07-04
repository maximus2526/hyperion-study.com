<?php
class Cart_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function post_order(array $order_details)
    {
        $orders_options = [
            ':payment_method' => $order_details["payment-method"],
            ':delivery_method' => $order_details["delivery-method"],
            ':total_price' => $order_details["total-price"],
            ':products_ids' => $order_details["product-ids"],
            ':count_of_products' => $order_details["product-counts"],
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