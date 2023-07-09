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

        $tamplate_data = [
            'products' => $products,
            'total_price' => $this->cart_model->get_total_price($products),
            'is_cart_empty' => $this->cart_model->is_cart_empty(),
        ];

        render('cart', $tamplate_data);
    }


    function increase_count()
    {
        $product_count = $_POST['product_count'];
        $product_ids = $this->order_model->get_ids();
        $products = $this->products_model->get_by_ids($product_ids);
        $counter = 0;

        foreach ($products as $key => $product) {
            $products[$key]['product_count'] = $product_count[$counter];
            $counter++;
        }
        $tamplate_data = [
            'products' => $products,
            'total_price' => $this->cart_model->get_total_price($products),
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

    function delete_action()
    {
        $id_to_delete = $_GET["delete_product"];
        $this->cart_model->delete($id_to_delete);
        redirect('?action=cart');
    }


    

}