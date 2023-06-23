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
            $products = $this->products_model->get_products_by_ids((array) $_SESSION['product_ids']);
        }

        $tamplate_data = [
            'products' => $products,
        ];
        
        render('cart', $tamplate_data);
    }


    function delete_product_action()
    {
        $id_to_delete = $_GET["delete_product"];
        $index = array_search($id_to_delete, $_SESSION['product_ids']);
        if ($index !== false) {
            unset($_SESSION['product_ids'][$index]);
        }
    }
}