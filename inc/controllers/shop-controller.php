<?php
class Shop_Controller
{
    public $products_model;
    
    public function __construct($products_model)
    {
        $this->products_model = $products_model;
    }

    public function render_action()
    {
        $count_of_products = $this->products_model->get_count();
        $default_product_limit = 20;
        $page_num = isset($_GET['page_num']) ? (int)$_GET['page_num'] : 1;
        $products_limit = isset($_GET['count_of_products']) ? (int)$_GET['count_of_products'] : $default_product_limit;
    
        $order_by = [
            isset($_GET['by-name']) ? " ORDER BY `product_name` " . $_GET['by-name'] : '',
            isset($_GET['by-date']) ? " ORDER BY `product_date` " . $_GET['by-date'] : '',
            isset($_GET['by-price']) ? " ORDER BY `product_cost` " . $_GET['by-price'] : ''
        ];
        $model_options = [
            'page_num' => $page_num < 1 ? 1 : $page_num,
            'products_limit' => $products_limit,
            'order_by' => $order_by,
        ];
    
        $count_of_buttons = $this->products_model->get_count_of_buttons($model_options);
    
        $template_data = [
            'count_of_products' => $count_of_products,
            'products_limit' => $products_limit,
            'products' => $this->products_model->get_paginated($model_options),
            'pages' => $count_of_buttons,
        ];
    
        render('shop', $template_data);
    }
    

    public function render_single_action()
    {
        if (isset($_GET['product-id'])) {
            $product_id = (int)$_GET['product-id'];
            $product = $this->products_model->get($product_id);
            if ($product) {
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

