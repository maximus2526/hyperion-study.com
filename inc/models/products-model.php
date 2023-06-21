<?php
class Products_Model
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function get_paginated_products(array $options)
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
        return range(1, round(count(array_chunk(range(1, $products_count), $options['products_limit']))));
    }

    public function get_count_of_products()
    {
        $sql = "SELECT COUNT(*) FROM `products`;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products_count = $statement->fetchColumn();
        return $products_count;
    }

    function get_banner_products(array $product_ids)
    {
        $placeholders = implode(' , ', array_fill(0, count($product_ids), '?'));
        $sql = "SELECT * FROM `products` WHERE product_id IN ({$placeholders})";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($product_ids);
        $products = $statement->fetchAll();
        return $products;
    }

    function get_product($product_id)
    {
        $sql = "SELECT * FROM `products` WHERE product_id = :product_id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $statement->execute();
        $product = $statement->fetchAll();
        return $product;
    }




    public function get_bestsellers_products()
    {
        $sql = "SELECT * FROM `products` ORDER BY `products`.`order_number` DESC LIMIT 6";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products;
    }

    public function get_recomended_products()
    {
        $sql = "SELECT * FROM `products` ORDER BY `products`.`order_number` DESC LIMIT 8";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products = $statement->fetchAll();
        return $products;
    }

}


?>