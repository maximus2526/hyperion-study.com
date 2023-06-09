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
        $tamplate_data = [
            'banner_products' => $this->products_model->get_by_ids($banner_products_id),
            'bestsellers' => $this->products_model->get_bestsellers(),
            'recomended_products' => $this->products_model->get_recomended(),
        ];

        render('home', $tamplate_data);
    }

    public function render_action()
    {
        render('about-us');
    }





}