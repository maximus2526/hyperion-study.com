<?php
class Orders_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function get_paginated(array $options)
    {
        $offset = ($options['page_num'] - 1) * $options['orders_limit'];
        $sql = "SELECT * FROM `orders` LIMIT :limit OFFSET :offset";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':limit', $options['orders_limit'], PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        $orders = $statement->fetchAll();
        return $orders;
    }


    public function get_count_of_buttons(array $options)
    {
        $sql = "SELECT COUNT(*) FROM `orders`;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $orders_count = $statement->fetchColumn();
        if (empty($orders_count)) {
            return array();
        }
        $chunked_array = array_chunk(range(1, $orders_count), $options['orders_limit']);
        $count_of_buttons = count($chunked_array, $options['orders_limit']);
        return range(1, round($count_of_buttons));
    }

    function delete_by_ids(array $orders_ids)
    {
        $placeholders = implode(', ', array_fill(0, count($orders_ids), '?'));
        $sql = "DELETE FROM `orders` WHERE order_id IN ({$placeholders})";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($orders_ids);
    }

    public function get_count_of_orders()
    {
        $sql = "SELECT COUNT(*) FROM `orders`;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $orders_count = $statement->fetchColumn();
        return $orders_count;
    }

    public function get($order_id)
    {
        $sql = "SELECT * FROM `orders` WHERE order_id = :order_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);
        $statement->execute();
        $order = $statement->fetch(PDO::FETCH_ASSOC);
        if ($order) {
            $sql = "SELECT order_items.*, products.product_cost, products.product_img
            FROM order_items
            JOIN products ON order_items.product_id = products.product_id
            WHERE order_items.order_id = :order_id";
            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(':order_id', $order_id, PDO::PARAM_INT);
            $statement->execute();
            $products_info = $statement->fetchAll(PDO::FETCH_ASSOC);
            return [
                'order' => $order, 
                'products_info' => $products_info
            ];

        } 
        return false;
    }



}


?>