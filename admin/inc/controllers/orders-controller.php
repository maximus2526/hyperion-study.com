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

    public function render_single_order_action()
    {
        $order_id = $_GET['order-id'];
        $order = $this->orders_model->get_order($order_id);
        if($order) {
            $order_items = $this->orders_model->get_order_detail($order_id);
            $template_data = [
                'order' => $order,
                'order_items' => $order_items,
            ];
            render_admin_pages('single-order', $template_data);
        } else {
            throw_404();
        }   
    }

    public function delete_orders_action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $orders_to_delete = $_POST['orders_to_delete'];
            if (empty($orders_to_delete)) {
                Errors::add_error('No selected any orders!');
            }
           
            if (!Errors::has_errors()) {
                $this->orders_model->delete_orders_by_ids($orders_to_delete);
            }

        }
        redirect('admin/?action=orders');
    }


}