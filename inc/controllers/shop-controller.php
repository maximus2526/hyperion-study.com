<?php

class Shop_Controller
{
    public $pages_model, $products_model;
    public $errors;
    public function __construct($pages_model, $products_model)
    {
        $this->pages_model = $pages_model;
        $this->products_model = $products_model;
    }

    public function render_shop_action()
    {
        $model_options = [
            'page_num' => !$_GET['page_num'] ? 1 : $_GET['page_num'],
            'entries_limit' => 20,
        ];

        $tamplate_data = [
            'products' => $this->products_model->get_paginated_products($model_options),
            'pages' => $this->products_model->get_count_of_buttons($model_options),
        ];

        render('shop', $tamplate_data);
    }

}