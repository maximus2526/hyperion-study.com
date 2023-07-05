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
            'page_num' => (!$page_num || ($page_num <= 1)) ? 1 : $page_num,
            'products_limit' => $products_limit,
        ];

        $count_of_buttons = $this->products_model->get_count_of_buttons($model_options);

        $template_data = [
            'count_of_products' => $count_of_products,
            'products_limit' => $products_limit,
            'products' => $this->products_model->get_paginated_products($model_options),
            'pages' => $count_of_buttons,

        ];

        render_admin_pages('products', $template_data);
    }

    public function delete_products_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $products_ids = $_POST['products_ids'];

            if (empty($_POST)) {
                Errors::add_error('No selected any products!');
            }
            if (!Errors::has_errors()) {
                $this->products_model->delete_products_by_ids($products_ids);
            }

        }
        redirect('admin/?action=products');
    }
    public function update_product_action()
    {
        if (!empty($_GET['product-id'])) {
            $product_id = $_GET['product-id'];
        } else {
            Errors::add_error("Product-id is missing");
            redirect("admin/?action=products");
        }

        $template_data = [
            'product' => $this->products_model->get_product((int) $product_id) ? $this->products_model->get_product((int) $product_id) : Errors::add_error('This entry do not exist!'),
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

        render_admin_pages('update-product', $template_data);
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

                if (!Errors::has_errors()) {
                    $result = $this->products_model->add_product($product_data);
                }

                if (isset($result)) {
                    redirect("admin/?action=update-product&product-id={$result}");
                    Errors::set_message("Product added successfully."); // TODO: Чомусь не хоче виводити сповіщення
                } else {
                    Errors::add_error("Failed to add product.");
                }
            }
        }

        render_admin_pages('add-product');
    }





}