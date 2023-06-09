<?php
class Products_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function get_paginated(array $options)
    {
        $offset = ($options['page_num'] - 1) * $options['products_limit'];

        foreach ($options['order_by'] as $item) {
            if ( !empty($item) ) {
                $order_by = $item;
            }
        }
        $sql = "SELECT * FROM `products` ". (isset($order_by) ? $order_by : '')  ." LIMIT :limit OFFSET :offset";
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
        $count_of_buttons = count($chunked_array, $options['products_limit']);
        return range(1, round($count_of_buttons));
    }

    public function get_count()
    {
        $sql = "SELECT COUNT(*) FROM `products`;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products_count = $statement->fetchColumn();
        return $products_count;
    }

    function get_by_ids(array $product_ids)
    {
        $placeholders = implode(', ', $product_ids);
        $sql = "SELECT * FROM `products` WHERE `products`.`product_id` IN ({$placeholders})";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products;
    }
    
    
    

    function get($product_id)
    {
        $sql = "SELECT * FROM `products` WHERE product_id = :product_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $statement->execute();
        $product = $statement->fetch();
        return $product;
    }

    public function get_bestsellers()
    {
        $sql = "SELECT * FROM `products` ORDER BY `products`.`order_number` DESC LIMIT 6";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products;
    }

    public function get_recomended()
    {
        $sql = "SELECT * FROM `products` ORDER BY `products`.`order_number` DESC LIMIT 8";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products;
    }

}


?>