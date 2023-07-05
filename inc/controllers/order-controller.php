<?php

class Pages_Controller
{
    public $order_model;
    public $cart_model;
    public function __construct($order_model, $cart_model)
    {
        $this->order_model = $order_model;
        $this->cart_model = $cart_model;
    }

    public function render_complete_order_action()
    {
        $tamplate_data = [

        ];

        render('order-complete', $tamplate_data);
    }

    function post_order_action()
    {
        // Handle form
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$this->cart_model->is_cart_empty()) {
            if ($_POST['agree-terms'] != 'on') {
                Errors::add_error("Please read and accept the terms and conditions to proceed with your order.");
            }

            
            
            $order_info = [
                'payment-method' => trim(htmlspecialchars($_POST['payment-method'])),
                'delivery-method' => trim(htmlspecialchars($_POST['delivery-method'])),
                'total-price' => (int) trim(htmlspecialchars($_POST['total-price'])),
                'first-name' => trim(htmlspecialchars($_POST['first-name'])),
                'last-name' => trim(htmlspecialchars($_POST['last-name'])),
                'email' => trim(htmlspecialchars($_POST['email'])),
                'address' => trim(htmlspecialchars($_POST['address'])),
            ];

            $order_products_info = array_combine((array) $this->order_model->get_products_ids(), (array) $_POST['product_count']);

            if (!is_null($_POST['notes'])) {
                $order_info['notes'] = trim(htmlspecialchars($_POST['notes']));
            }



            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                Errors::add_error("Invalid email");
            }

            if (empty($order_info['payment-method'])) {
                Errors::add_error("Payment method field is empty!");
            } 
            if (empty($order_info['delivery-method'])) {
                Errors::add_error("Delivery method field is empty!");
            } 
            if (empty($order_info['total-price'])) {
                Errors::add_error("total-price field is empty! Contact with administrator.");
            } 
            if (empty($order_info['first-name'])) {
                Errors::add_error("First name field is empty!");
            } 
            if (empty($order_info['last-name'])) {
                Errors::add_error("Last name field is empty!");
            } 
            if (empty($order_info['email'])) {
                Errors::add_error("Email field is empty!");
            } 
            if (empty($order_info['address'])) {
                Errors::add_error("Address field is empty!");
            }

            $delivery_options = ['nova', 'ukr'];
            $payment_options = ['direct', 'on-delivery'];

            if (!in_array($_POST['delivery-method'], $delivery_options) or !in_array($_POST['payment-method'], $payment_options)) {
                Errors::add_error("Something wrong with radio buttons! Contact with administrator.");
            }

            if (!Errors::has_errors()) {
                $add_order_result = $this->cart_model->add_order($order_info);
                $order_products_result = $this->cart_model->add_order_products_info($order_products_info, $add_order_result);
                if ($add_order_result && $order_products_result) {
                    Errors::set_message('Successfully! Wait while you will be contacted by operator.');
                    redirect('?action=order-complete');
                    // $this->order_model->send_notification_to_email(); // mail sending
                } else {
                    Errors::add_error('Unsuccessful! Try again or contact with administrator.');
                    redirect('?action=cart');
                }
                
            } else {
                redirect('?action=cart');
            }
        } else {
            redirect('?action=cart');
        }
    }





}