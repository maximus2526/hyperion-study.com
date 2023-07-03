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
            if (empty($post_array)) {
                Errors::add_error('No selected any products!');
            }
            foreach ($post_array as $key => $value) {
                if (strpos($key, "product-id") !== false) {
                    $product_id = (int) $value;
                    array_push($products_ids, $product_id);
                }
            }
            if (!Errors::has_errors()) {
                $this->products_model->delete_products_by_ids($products_ids);
            }

        }
        redirect('admin/?action=products');
    }
    public function update_product_action()
    {
        $product_id = isset($_GET['product-id']) ? $_GET['product-id'] : Errors::add_error("Product-id is missing");
        $template_data = [
            'product' => $this->products_model->get_product((int) $product_id),
        ];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $required_fields = ['product_img', 'product_name', 'product_cost', 'short_description'];
            $missing_fields = [];

            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    $missing_fields[] = $field;
                }
            }
            $product_id = $_POST['product_id'];
            if (!empty($missing_fields)) {
                Errors::add_error("Please fill in all required fields");
            } else {
                $product_data = [
                    'product_img' => $_POST['product_img'],
                    'product_name' => $_POST['product_name'],
                    'product_cost' => $_POST['product_cost'],
                    'recommended' => isset($_POST['recommended']) ? 1 : 0,
                    'hot' => isset($_POST['hot']) ? 1 : 0,
                    'short_description' => $_POST['short_description']
                ];

                $result = $this->products_model->update_product($product_id, $product_data);

                if ($result) {
                    Errors::set_message("Product updated successfully.");
                } else {
                    Errors::add_error("Failed to update product.");
                }
            }
        }

        render('update-product', $template_data);
    }

    public function add_product_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $required_fields = ['product_img', 'product_name', 'product_cost', 'short_description'];
            $missing_fields = [];

            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    $missing_fields[] = $field;
                }
            }

            if (!empty($missing_fields)) {
                Errors::add_error("Please fill in all required fields");
            } else {
                $product_data = [
                    'product_img' => $_POST['product_img'],
                    'product_name' => $_POST['product_name'],
                    'product_cost' => $_POST['product_cost'],
                    'recommended' => isset($_POST['recommended']) ? 1 : 0,
                    'hot' => isset($_POST['hot']) ? 1 : 0,
                    'short_description' => $_POST['short_description']
                ];
                $result = $this->products_model->add_product($product_data);

                if ($result) {
                    Errors::set_message("Product added successfully.");
                } else {
                    Errors::add_error("Failed to add product.");
                }
            }
        }

        render('add-product');
    }





}