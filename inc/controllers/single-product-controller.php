<?php

class Single_Product_Controller
{
    public $pages_model, $products_model;
    public $errors;
    public function __construct($pages_model, $products_model)
    {
        $this->pages_model = $pages_model;
        $this->products_model = $products_model;
    }

    public function render_single_product_action()
    {
        $product_id = (int) $_GET['product-id'];
        $product = $this->products_model->get_product($product_id)[0];
        $tamplate_data = [
            'product' => $product,
        ];

        if (is_null($product)) {
            throw_404();
        }

        render('single-product', $tamplate_data);
    }



}