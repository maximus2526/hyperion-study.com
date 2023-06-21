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

    public function switch_product_layout_action()
    {

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
        $has_paginated = has_param('page_num'); // For saving page with changed filter 
        $has_сount_of_products = has_param('count_of_products'); // For saving showing more products with changed page

        $tamplate_data = [
            'count_of_products' => $count_of_products,
            'products_limit' => $products_limit,
            'products' => $this->products_model->get_paginated_products($model_options),
            'pages' => $count_of_buttons,
            'has_paginated' => $has_paginated,
            'has_сount_of_products' => $has_сount_of_products,
        ];

        render('shop', $tamplate_data);
    }



}