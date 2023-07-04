<?php

class Cart_Controller
{
    public $products_model;
    public $cart_model;
    public $products_ids;

    public function __construct($products_model, $cart_model)
    {
        $this->products_model = $products_model;
        $this->cart_model = $cart_model;
        $this->products_ids = $this->cart_model->get_products_ids();
    }

    public function render_cart_action()
    {

        $product_ids = explode(',', $this->products_ids);
        $products = $this->products_model->get_products_by_ids($product_ids);
        foreach ($products as $product) {
            $total_price += $product['product_cost'] * (isset($_SESSION['product_quantities']) ? $_SESSION['product_quantities'][$product['product_id']] : 1);
        }

        $tamplate_data = [
            'products' => $products,
            'total_price' => $total_price,
            'is_cart_empty' => $this->cart_model->is_cart_empty(),
        ];

        render('cart', $tamplate_data);
    }

    function add_product_action()
    {
        if (isset($_GET['product-id'])) {
            $product_id = $_GET['product-id'];
            if (!in_array($product_id, $_SESSION['product_ids'])) {
                $this->cart_model->add_product_to_cart($product_id);
            } else {
                Errors::add_error("Product is already in the cart.");
            }
        } else {
            Errors::add_error("Product ID is missing.");
        }

        redirect('?action=cart');
    }

    function increase_product_quantity_action()
    {
        $product_id = isset($_GET['product_id']) ? (int) $_GET['product_id'] : Errors::add_error('Dont valide product_id!');
        $quantity = isset($_GET['quantity']) ? (int) $_GET['quantity'] : 1;
        $this->cart_model->increase_product_quantity($product_id);
        $product_count = $_SESSION["products_quantities"][$product_id];
        redirect("?action=cart&product-count={$product_count}");
    }

    function delete_product_action()
    {
        $id_to_delete = $_GET["delete_product"];
        $this->cart_model->delete_product_from_cart($id_to_delete);
        redirect('?action=cart');
    }


    function post_order_action()
    {
        // Handle form
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$this->cart_model->is_cart_empty()) {
            if ($_POST['agree-terms'] != 'on') {
                Errors::add_error("Please read and accept the terms and conditions to proceed with your order.");
            }
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'count-product-') === 0) {
                    $product_counts .=  $value . ',';
                } 
            }
            $product_counts = rtrim($product_counts, ','); // Delete in the end whitespaces or selected char
            
            $order_details = [
                'payment-method' => trim(htmlspecialchars($_POST['payment-method'])),
                'delivery-method' => trim(htmlspecialchars($_POST['delivery-method'])),
                'total-price' => (int) trim(htmlspecialchars($_POST['total-price'])),
                'product-counts' => trim(htmlspecialchars($_POST)),
                'first-name' => trim(htmlspecialchars($_POST['first-name'])),
                'last-name' => trim(htmlspecialchars($_POST['last-name'])),
                'email' => trim(htmlspecialchars($_POST['email'])),
                'address' => trim(htmlspecialchars($_POST['address']))
            ];

            if (!is_null($_POST['notes'])) {
                $order_details['notes'] = trim(htmlspecialchars($_POST['notes']));
            }

            $delivery_options = ['nova', 'ukr'];
            $payment_options = ['direct', 'on-delivery'];

            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                Errors::add_error("Invalid email");
            }

            if (empty($order_details['payment-method'])) {
                Errors::add_error("Payment method field is empty!");
            } 
            if (empty($order_details['delivery-method'])) {
                Errors::add_error("Delivery method field is empty!");
            } 
            if (empty($order_details['total-price'])) {
                Errors::add_error("total-price field is empty! Contact with administrator.");
            } 
            if (empty($order_details['first-name'])) {
                Errors::add_error("First name field is empty!");
            } 
            if (empty($order_details['last-name'])) {
                Errors::add_error("Last name field is empty!");
            } 
            if (empty($order_details['email'])) {
                Errors::add_error("Email field is empty!");
            } 
            if (empty($order_details['address'])) {
                Errors::add_error("Address field is empty!");
            }

            if (!in_array($_POST['delivery-method'], $delivery_options) or !in_array($_POST['payment-method'], $payment_options)) {
                Errors::add_error("Something wrong with radio buttons! Contact with administrator.");
            }

            $order_details['product-ids'] = $this->products_ids;

            if ($this->cart_model->post_order($order_details)  && !Errors::has_errors()) {
                Errors::set_message('Successfully! Wait while you will be contacted by operator.');
                redirect('?action=order-complete');
            } else {
                redirect('?action=cart');
            }
        } else {
            redirect('?action=cart');
        }
    }

}