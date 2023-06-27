<?php

class Cart_Controller
{
    public $products_model;
    public $cart_model;
    public function __construct($products_model, $cart_model)
    {
        $this->products_model = $products_model;
        $this->cart_model = $cart_model;
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
            Errors::add_error("Don't have any added products");
            $products = [];
        } else {
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

    }



    function delete_product_action()
    {
        $id_to_delete = $_GET["delete_product"];
        $this->cart_model->delete_product_from_cart($id_to_delete);
    }


    function post_order_action()
    {

        // Handle form

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $post_array = $_POST;

            foreach ($post_array as &$field) {
                $field = trim(htmlspecialchars($field));
            }


            $order_details = [
                'payment-method' => $post_array['payment-method'],
                'delivery-method' => $post_array['delivery-method'],
                'total-price' => (int) $post_array['total-price'],
                'product-count' => (int) $post_array['product-count'],
                'first-name' => $post_array['first-name'],
                'last-name' => $post_array['last-name'],
                'email' => $post_array['email'],
                'address' => $post_array['address']
            ];
            

            if (!filter_var($post_array['email'], FILTER_VALIDATE_EMAIL)) {
                Errors::add_error("Invalid email");
            }

            $has_have_empty_field = false;

            $delivery_options = ['nova', 'ukr'];
            $payment_options = ['direct', 'on-delivery'];

            if (!in_array($post_array['delivery-method'], $delivery_options) or !in_array($post_array['payment-method'], $payment_options)) {

                Errors::add_error("Something wrong with radio buttons! Contact with administrator.");
            }

            if ((count(array_filter($order_details, 'is_empty')) > 0)) {
                $has_have_empty_field = true;
            }

            if ($has_have_empty_field) {
                Errors::add_error("Empty fields for required* are not allowed ");
            }

            $products_ids = implode(',', $_SESSION['product_ids']);
            $order_details['product-ids'] = $products_ids;
            if (empty($products_ids)) {
                Errors::add_error("Don't added any product!");
            }

            if (!empty($post_array['order-comments'])) {
                $order_details['notes'] = $post_array['order-comments'];
            }
            if (!Errors::has_errors()) {
                $this->cart_model->post_order($order_details);
                Errors::set_message('Successfully! Whait while you will be contacted by operator.');
            }

        } else {
            Errors::add_error("Something wrong! Contact with administrator.");
        }

        redirect('?action=cart');
    }

}