<?php
class Router
{
    public $pages_controller;
    public $shop_controller;
    public $single_product_controller;
    public $contact_us_controller;
    public function __construct($pages_controller, $shop_controller, $single_product_controller, $contact_us_controller)
    {
        $this->pages_controller = $pages_controller;
        $this->shop_controller = $shop_controller;
        $this->single_product_controller = $single_product_controller;
        $this->contact_us_controller = $contact_us_controller;
    }
    public function route()
    {
        switch ($_GET['action']) {
            case 'shop':
                $this->shop_controller->render_shop_action();
                break;
            case 'about-us':
                $this->pages_controller->render_about_us_action();
                break;
            case 'contact-us':
                $this->contact_us_controller->render_contact_us_action();
                break;
            case 'product':
                $this->single_product_controller->render_single_product_action();
                break;
            default:
                $this->pages_controller->render_main_page_action();
        }
    }

}