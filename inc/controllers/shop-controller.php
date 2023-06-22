<?php

class Shop_Controller
{
    public $products_model;
    public $errors;
    public function __construct($products_model, $errors)
    {
        $this->products_model = $products_model;
        $this->errors = $errors;
    }


    public function render_shop_action()
    {
        $count_of_products = $this->products_model->get_count_of_products();
        $default_product_limit = 20;
        $page_num = (int) $_GET['page_num'];


        $products_limit = (int) $_GET["count_of_products"] ? $_GET["count_of_products"] : $default_product_limit;
        if ($products_limit < 1) {
            $this->errors::add_error("Can't show the negative number of products");
            $products_limit = $default_product_limit;
        } elseif ($products_limit > $count_of_products) {
            $this->errors::add_error("Can't show bigger than have products");
            $products_limit = $default_product_limit;
        }

        $model_options = [
            'page_num' => (!$page_num or ($page_num <= 1)) ? 1 : $page_num,
            'products_limit' => $products_limit,
        ];

        $count_of_buttons = $this->products_model->get_count_of_buttons($model_options);
        
        $template_data = [
            'count_of_products' => $count_of_products,
            'products_limit' => $products_limit,
            'products' => $this->products_model->get_paginated_products($model_options),
            'pages' => $count_of_buttons,
            
        ];

        render('shop', $template_data);
    }

    public function render_single_product_action()
    {
        $product_id = (int) $_GET['product-id'];
        $product = $this->products_model->get_product($product_id);
        $tamplate_data = [
            'product' => $product,
        ];

        if (is_null($product)) {
            throw_404();
        }

        render('single-product', $tamplate_data);
    }
}