<?php
class Router
{
    public $pages_controller;
    public $shop_controller;
    public $single_product_controller;
    public $contact_us_controller;
    public $cart_controller;
    public function __construct(array $to_route_list)
    {
        $this->pages_controller = $to_route_list['pages_controller'];
        $this->shop_controller = $to_route_list['shop_controller'];
        $this->single_product_controller = $to_route_list['single_product_controller'];
        $this->contact_us_controller = $to_route_list['contact_us_controller'];
        $this->cart_controller = $to_route_list['cart_controller'];
    }
    public function route()
    {
        switch ($_GET['action']) {
            case 'shop':
                $this->shop_controller->render_shop_action();
                break;
            case 'add-to-cart':
                $this->cart_controller->add_product_action();
                break;
            case 'cart':
                if (isset($_GET["delete_product"])) {
                    $this->cart_controller->delete_product_action();
                }
                $this->cart_controller->render_cart_action();
                break;
            case 'post-order':
                $this->cart_controller->post_order_action();
                break;
            case 'increase_product':
                $this->cart_controller->increase_product_quantity_action();
                break;
            case 'about-us':
                $this->pages_controller->render_about_us_action();
                break;
            case 'contact-us':
                $this->contact_us_controller->render_contact_us_action();
                break;
            case 'product':
                $this->shop_controller->render_single_product_action();
                break;

            case 'order-complete':
                $this->pages_controller->render_complete_test_action();
                break;

            default:
                $this->pages_controller->render_main_page_action();
        }
    }

}