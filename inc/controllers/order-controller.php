<?php

class Pages_Controller
{
    public $order_model;
    public function __construct($order_model)
    {
        $this->order_model = $order_model;
    }

    public function render_complete_order_action()
    {
        $tamplate_data = [

        ];

        render('order-complete', $tamplate_data);
    }

    public function notifications_action()
    {   
        $order_detail = $_POST['order_detail'];
        $this->order_model->send_notification_to_email();
    }




}