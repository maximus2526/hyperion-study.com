<?php

class Order_Controller
{
    public $order_model;
    public $cart_model;
    public $mail_model;
    public function __construct($order_model, $cart_model, $mail_model)
    {
        $this->order_model = $order_model;
        $this->cart_model = $cart_model;
        $this->mail_model = $mail_model;
    }

    public function render_action()
    {
        $order_id = $_GET['order_id'];
        $order = $this->order_model->get($order_id);
        if ($order) {
            render('order-complete', $order);
        } else {
            throw_404();
        }
    }

    function post_action()
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

            $order_products_info = array_combine((array) $this->order_model->get_ids(), (array) $_POST['product_count']);

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
                // Post Order
                $add_order_result = $this->order_model->add_order($order_info);
                $order_products_result = $this->order_model->add_products_info($order_products_info, $add_order_result);
                if ($add_order_result && $order_products_result) {
                    Errors::set_message('Successfully! Wait while you will be contacted by operator.');
                    $order = $this->order_model->get($add_order_result);
                    if ($order) {
                        redirect('?action=order-complete');
                    }
                    $this->mail_model->send_order_info($order); // mail sending
                    redirect('?action=order-complete&order_id=' . $add_order_result);

                } else {
                    Errors::add_error('Unsuccessful! Try again or contact with administrator.');
                    redirect('?action=cart');
                }

            } else {
                $saved = isset($_POST) ? $_POST : '';
                $queryParams = http_build_query(array('saved' => $saved));
                redirect("?action=cart&$queryParams");

            }
        } else {
            redirect('?action=cart');
        }
    }





}