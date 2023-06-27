<?php

class Pages_Controller
{
    public $products_model;
    public function __construct($products_model)
    {
        $this->products_model = $products_model;
    }

    public function render_main_page_action()
    {
        $banner_products_id = [3, 4, 5]; // Choice product ids for home page banner's products
        $banner_products = $this->products_model->get_products_by_ids($banner_products_id); // Дороби
        $tamplate_data = [
            'banner_products' => $banner_products,
            'bestsellers' => $this->products_model->get_bestsellers_products(),
            'recomended_products' => $this->products_model->get_recomended_products(),
        ];

        render('home', $tamplate_data);
    }

    public function render_about_us_action()
    {
        render('about-us');
    }

    public function render_complete_test_action()
    {
        render('order-complete');
    }





}