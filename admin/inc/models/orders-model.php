<?php
class Orders_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function get_paginated_orders(array $options)
    {
        $offset = ($options['page_num'] - 1) * $options['products_limit'];
        $sql = "SELECT * FROM `products` LIMIT :limit OFFSET :offset";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':limit', $options['products_limit'], PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products;
    }


    public function get_count_of_buttons(array $options)
    {
        $sql = "SELECT COUNT(*) FROM `products`;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products_count = $statement->fetchColumn();
        if (empty($products_count)) {
            return array();
        }
        $chunked_array = array_chunk(range(1, $products_count), $options['products_limit']);
        $count_of_buttons = count($chunked_array, $options['orders_limit']);
        return range(1, round($count_of_buttons));
    }

    function delete_orders_by_ids(array $orders_ids)
    {
        $placeholders = implode(', ', array_fill(0, count($orders_ids), '?'));
        $sql = "DELETE FROM `orders` WHERE orders_id IN ({$placeholders})";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($orders_ids);
    }


    function get_order($orders_id)
    {
        $sql = "SELECT * FROM `orders` WHERE orders_id = :orders_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':orders_id', $orders_id, PDO::PARAM_INT);
        $statement->execute();
        $product = $statement->fetch();
        return $product;
    }

    
}


?>