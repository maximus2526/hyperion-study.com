<?php

class Pages_Controller
{
    public $pages_model, $products_model;
    public $errors;
    public function __construct($pages_model, $products_model)
    {
        $this->pages_model = $pages_model;
        $this->products_model = $products_model;
    }

    public function render_main_page_action()
    {
        $needed_products_id = [3, 4, 5]; // Choice product ids for home page banner's products
        $banner_products = array();
        foreach ($needed_products_id as $id) {
            $product = $this->products_model->get_product($id)[0]; 
            if (!empty($product)) {
                array_push($banner_products, $product);
            } 
        }

        $tamplate_data = [
            'banner_products' => $banner_products,
            'bestsellers' => $this->products_model->get_top_products(6, 'order_number'),
            'recomended_products' => $this->products_model->get_top_products(8, 'recommended'),
        ];

        render('home', $tamplate_data);
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

    public function render_single_product_action()
    {

        $tamplate_data = [
            'product' => $this->products_model->get_product($_GET['product-id'])[0],
        ];

        if (is_null($this->products_model->get_product($_GET['product-id'])[0])) {
            throw_404();
        }

        render('single-product', $tamplate_data);
    }

    public function render_about_us_action()
    {
        render('about-us');
    }
    public function render_contact_us_action()
    {
        render('contact-us');
    }


  

}