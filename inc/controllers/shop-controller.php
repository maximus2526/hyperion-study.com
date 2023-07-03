<?php
class Shop_Controller
{
    public $products_model;
    
    public function __construct($products_model)
    {
        $this->products_model = $products_model;
    }

    public function render_shop_action()
    {
        $count_of_products = $this->products_model->get_count_of_products();
        $default_product_limit = 20;
        $page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
        $products_limit = isset($_GET['count_of_products']) ? (int)$_GET['count_of_products'] : $default_product_limit;

        if ($products_limit < 1) {
            Errors::add_error("Can't show a negative number of products");
            $products_limit = $default_product_limit;
        } elseif ($products_limit > $count_of_products) {
            Errors::add_error("Can't show more products than available");
            $products_limit = $default_product_limit;
        }

        $model_options = [
            'page_num' => $page_num <= 1 ? 1 : $page_num,
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
        if (isset($_GET['product-id'])) {
            $product_id = (int)$_GET['product-id'];
            $product = $this->products_model->get_product($product_id);

            if (!is_null($product)) {
                $tamplate_data = [
                    'product' => $product,
                ];
        
                render('single-product', $tamplate_data);
            } else {
                throw_404();
            }
        } else {
            
            throw_404();
        }

       
    }
}

