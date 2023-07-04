<?php

class Orders_Controller
{
    public $orders_model;
    public function __construct($orders_model)
    {
        $this->orders_model = $orders_model;

    }


    public function render_orders_action()
    {
        $count_of_orders = $this->orders_model->get_count_of_orders();
        $orders_limit = 10;
        $page_num = (int) $_GET['page_num'];
        if ($orders_limit < 1) {
            Errors::add_error("Can't show the negative number of orders");
        } elseif ($orders_limit > $count_of_orders) {
            Errors::add_error("Can't show bigger than have orders");
        }

        $model_options = [
            'page_num' => (!$page_num || ($page_num <= 1)) ? 1 : $page_num,
            'orders_limit' => $orders_limit,
        ];

        $count_of_buttons = $this->orders_model->get_count_of_buttons($model_options);

        $template_data = [
            'count_of_orders' => $count_of_orders,
            'orders_limit' => $orders_limit,
            'orders' => $this->orders_model->get_paginated_orders($model_options),
            'pages' => $count_of_buttons,

        ];

        render_admin_pages('orders', $template_data);
    }

    public function delete_orders_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post_array = $_POST;
            $orders_ids = [];
            if (empty($post_array)) {
                Errors::add_error('No selected any orders!');
            }
            foreach ($post_array as $key => $value) {
                if (strpos($key, "product-id") !== false) {
                    $product_id = (int) $value;
                    array_push($orders_ids, $product_id);
                }
            }
            if (!Errors::has_errors()) {
                $this->orders_model->delete_orders_by_ids($orders_ids);
            }

        }
        redirect('admin/?action=orders');
    }


}