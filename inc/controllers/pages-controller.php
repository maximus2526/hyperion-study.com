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
        $banner_products_id = [3, 4, 5]; // Choice product ids for home page banner's products
        $banner_products = $this->products_model->get_banner_products($banner_products_id); // Дороби
        $tamplate_data = [
            'banner_products' => $banner_products,
            'bestsellers' => $this->products_model->get_bestsellers_products(),
            'recomended_products' => $this->products_model->get_recomended_products(),
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