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
        $products = $this->products_model->get_products_by_ids((array) $this->products_ids);
        

        foreach ($products as $product) {
            $total_price += $product['product_cost'];
        }

        $tamplate_data = [
            'products' => $products,
            'total_price' => $total_price,
            'is_cart_empty' => $this->products_ids,
        ];
        render('cart', $tamplate_data);
    }

    function add_product_action()
    {
        $this->cart_model->add_product_to_cart();
        redirect('?action=cart');
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

            if ($post_array['agree-terms'] != 'on') {
                Errors::add_error("Please read and accept the terms and conditions to proceed with your order.");
            }

            $order_details = [
                'payment-method' => trim(htmlspecialchars($post_array['payment-method'])),
                'delivery-method' => trim(htmlspecialchars($post_array['delivery-method'])),
                'total-price' => (int) trim(htmlspecialchars($post_array['total-price'])),
                'product-count' => (int) trim(htmlspecialchars($post_array['product-count'])),
                'first-name' => trim(htmlspecialchars($post_array['first-name'])),
                'last-name' => trim(htmlspecialchars($post_array['last-name'])),
                'email' => trim(htmlspecialchars($post_array['email'])),
                'address' => trim(htmlspecialchars($post_array['address']))
            ];

            $delivery_options = ['nova', 'ukr'];
            $payment_options = ['direct', 'on-delivery'];

            if (!filter_var($post_array['email'], FILTER_VALIDATE_EMAIL)) {
                Errors::add_error("Invalid email");
            }

            if (empty($order_details['payment-method'])) {
                Errors::add_error("Payment method field is empty!");
            } elseif (empty($order_details['delivery-method'])) {
                Errors::add_error("Delivery method field is empty!");
            } elseif (empty($order_details['total-price'])) {
                Errors::add_error("total-price field is empty! Contact with administrator.");
            } elseif (empty($order_details['first-name'])) {
                Errors::add_error("First name field is empty!");
            } elseif (empty($order_details['last-name'])) {
                Errors::add_error("Last name field is empty!");
            } elseif (empty($order_details['email'])) {
                Errors::add_error("Email field is empty!");
            } elseif (empty($order_details['address'])) {
                Errors::add_error("Address field is empty!");
            }

            if (!in_array($post_array['delivery-method'], $delivery_options) or !in_array($post_array['payment-method'], $payment_options)) {
                Errors::add_error("Something wrong with radio buttons! Contact with administrator.");
            }

            $order_details['product-ids'] = $this->products_ids;

            if (!empty($post_array['order-comments'])) {
                $order_details['notes'] = trim(htmlspecialchars($post_array['order-comments']));
            }
            if (!Errors::has_errors()) {
                if ($this->cart_model->post_order($order_details)) {
                    Errors::set_message('Successfully! Whait while you will be contacted by operator.');
                    redirect('?action=order-complete');
                }
            } else {
                redirect('?action=cart');
            
            }
        } else {
            Errors::add_error("Something wrong! Contact with administrator.");
        }

        
    }

}