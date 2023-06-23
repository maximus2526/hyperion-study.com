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
            array_push($_SESSION['product_ids'], (int) $_GET['product-id']);
        }

        $products = $this->products_model->get_products_by_ids($_SESSION['product_ids']);
        
        if (isset($_GET["delete_product"]) and isset($_SESSION['product_ids'][$_GET["delete_product"]])) {
            unset($_SESSION['product_ids'][$_GET["delete_product"]]);
            $products = $this->products_model->get_products_by_ids($_SESSION['product_ids']);
        }

        if (count($products) == 0) {
            $this->errors::add_error("Don't have any added products");
            $products = array();
        }
        

        $tamplate_data = [
            'products' => $products,
        ];

        render('cart', $tamplate_data);
    }


    // Contact-us form handling
}