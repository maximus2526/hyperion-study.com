<?php

class Products_Controller
{
    public $products_model;
    public function __construct($products_model)
    {
        $this->products_model = $products_model;

    }


    public function render_products_action()
    {
        $count_of_products = $this->products_model->get_count_of_products();
        $products_limit = 10;
        $page_num = (int) $_GET['page_num'];
        if ($products_limit < 1) {
            Errors::add_error("Can't show the negative number of products");
        } elseif ($products_limit > $count_of_products) {
            Errors::add_error("Can't show bigger than have products");
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

        render('products', $template_data);
    }

    public function delete_products_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post_array = $_POST;
            $products_ids = [];
            if (empty($post_array)){
                Errors::add_error('No selected any products!');
            }
            foreach ($post_array as $key => $value) {
                if (strpos($key, "product-id") !== false) {
                    $product_id = (int) $value;
                    array_push($products_ids, $product_id);
                    var_dump($product_id);
                }
            }
            if (!Errors::has_errors()) {
                $this->products_model->delete_products_by_ids($products_ids);
            }
            
        } 
        redirect('admin/?action=products');
    }
    public function edit_product_action()
    {
        $template_data = [
            'product' => $this->products_model->get_product((int) $_GET['product-id']),
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            // Form handling
        }
        render('product-edit', $template_data);
    }
    
    public function add_product_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            // Form handling
        }
        render('add-product');
    }
    

    

   
}