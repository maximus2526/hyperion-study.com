<?php

class Cart_Controller
{
    public $products_model;
    public $cart_model;
    public $errors;
    public function __construct($products_model, $cart_model, $errors)
    {
        $this->products_model = $products_model;
        $this->cart_model = $cart_model;
        $this->errors = $errors;
    }
    public function render_cart_action()
    {
        if (isset($_GET['product-id'])) {
            if (empty($_SESSION['product_ids'])) {
                $_SESSION['product_ids'] = array();
            }
            if (!in_array($_GET['product-id'], $_SESSION['product_ids'])) {
                $product_id = (int) $_GET['product-id'];
                array_push($_SESSION['product_ids'], $product_id);
            }
        }

        if (empty($_SESSION['product_ids']) or ($_SESSION['product_ids'] == NULL)) {
            $this->errors::add_error("Don't have any added products");
            $products = [];
        } else {
            var_dump($_SESSION['product_ids']);
            $products = $this->products_model->get_products_by_ids((array) $_SESSION['product_ids']);
        }

        foreach ($products as $product) {
            $total_price += $product['product_cost'];
        }

        $tamplate_data = [
            'products' => $products,
            'total_price' => $total_price,
        ];

        render('cart', $tamplate_data);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            var_dump( $_POST );
        }
        
    }



    function delete_product_action()
    {
        $id_to_delete = $_GET["delete_product"];
        $index = array_search($id_to_delete, $_SESSION['product_ids']);
        if ($index !== false) {
            unset($_SESSION['product_ids'][$index]);
        }
    }


    function post_order_action()
    {
        
        // Handle form
        $products_ids = $_SESSION['product_ids'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($products_ids)) {
                $this->errors::add_error("Don't added any product!");
            }

            $post_array = $_POST;
            
            foreach ($post_array as &$field) {
                $field = trim(htmlspecialchars($field));
            }


            $order_details = [$post_array['payment_method'], $post_array['delivery_method'], (int) $post_array['total_price'], $products_ids];
            $client_info = [$post_array['first_name'], $post_array['last_name'], $post_array['email'], $post_array['address']];

            $has_have_empty_field = false;

            $delivery_options = ['nova', 'ukr'];
            $payment_options = ['direct', 'on-delivery'];

            if (!in_array($post_array['delivery_method'], $delivery_options) or !in_array($post_array['payment_method'], $payment_options)) {
         
                $this->errors::add_error("Something wrong with radio buttons! Contact with administrator. 
                {$post_array['delivery_method']}, 
                {$post_array['payment_method']}
                ");
            }


            foreach ($order_details as $field) {
                if (empty($field)) {
                    $has_have_empty_field = true;
                }
            }

            foreach ($client_info as $field) {
                if (empty($field)) {
                    $has_have_empty_field = true;
                }
            }

            if ($has_have_empty_field) {
                $this->errors::add_error("Empty fields for required* are not allowed");
            }

            if (!empty($post_array['order-comments'])) {
                array_push($order_details, $post_array['order-comments']);
            }


            var_dump($post_array);
            if (!$this->errors::has_errors()) {
                $this->cart_model->post_order($order_details, $client_info);
                $this->errors::set_message('Successfully! Whait while you will be contacted by operator.');
            }

        } else {
            $this->errors::add_error("Something wrong! Contact with administrator.");
        }
        redirect('?action=cart');
        var_dump( $_POST );
    }

}