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
        $page_num = (int)$_GET['page_num'];
        $model_options = [
            'page_num' => !$page_num ? 1 : $page_num,
            'entries_limit' => 20,
        ];

        $tamplate_data = [
            'products' => $this->products_model->get_paginated_products($model_options),
            'pages' => $this->products_model->get_count_of_buttons($model_options),
        ];

        render('shop', $tamplate_data);
    }

}