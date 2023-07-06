

<?php
class Mail_Model
{
public function send_order_info($order, $order_items) {
    $to = $order['email'];
    $subject = "Order #{$order['order_id']}";
    include_once('views/mail-tamplates/order-complete-template.php');
    $message = $template_content;
    $headers = "From: site@domen.com";
    return mail($to, $subject, $message, $headers);
    }
}
?>