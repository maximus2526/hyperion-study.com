<?php

class Cart_Controller
{
    public $products_model;
    public $cart_model;
    public $order_model;

    public function __construct($products_model, $cart_model, $order_model)
    {
        $this->products_model = $products_model;
        $this->cart_model = $cart_model;
        $this->order_model = $order_model;
    }

    public function render_action()
    {
        $product_ids = $this->order_model->get_ids();
        if (!empty($product_ids)) {
            $products = $this->products_model->get_by_ids($product_ids);
        } else {
            $products = [];
        }
        
        foreach ($products as $product) {
            $total_price += $product['product_cost'];
        }

        $tamplate_data = [
            'products' => $products,
            'total_price' => $total_price,
            'is_cart_empty' => $this->cart_model->is_cart_empty(),
        ];

        render('cart', $tamplate_data);
    }

    function add_action()
    {
        if (isset($_GET['product-id'])) {
            $product_id = $_GET['product-id'];
            $this->cart_model->add($product_id);
        } else {
            Errors::add_error("Product ID is missing.");
        }

        redirect('?action=cart');
    }

    function increase_quantity_action()
    {
        // redirect("?action=cart&product-count={$product_count}");
    }

    function delete_action()
    {
        $id_to_delete = $_GET["delete_product"];
        $this->cart_model->delete($id_to_delete);
        redirect('?action=cart');
    }


    

}