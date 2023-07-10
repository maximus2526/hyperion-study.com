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
        $sql = "SELECT * FROM `products` ORDER BY `products`.`product_id` DESC LIMIT :limit OFFSET :offset ";
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

    public function get_count_of_products()
    {
        $sql = "SELECT COUNT(*) FROM `products`;";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $products_count = $statement->fetchColumn();
        return $products_count;
    }

    function delete_by_ids(array $product_ids)
    {
        $placeholders = implode(', ', array_fill(0, count($product_ids), '?'));
        $sql = "DELETE FROM `products` WHERE product_id IN ({$placeholders})";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($product_ids);
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

    function add($product_data)
    {
        $sql = "INSERT INTO `products` (product_img, product_name, product_cost, recommended, hot, short_description)
                VALUES (:product_img, :product_name, :product_cost, :recommended, :hot, :short_description)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':product_img' => $product_data['product_img'],
            ':product_name' => $product_data['product_name'],
            ':product_cost' => $product_data['product_cost'],
            ':recommended' => $product_data['recommended'],
            ':hot' => $product_data['hot'],
            ':short_description' => $product_data['short_description']
        ]);
        return $this->pdo->lastInsertId();
    }
    
    
    function update($product_id, $product_data)
    {
        $fields = array_keys($product_data);
        $placeholders = implode(' = ?, ', $fields) . ' = ?';
        $sql = "UPDATE `products` SET {$placeholders} WHERE product_id = ?";

        $statement = $this->pdo->prepare($sql);

        $values = array_values($product_data);
        $values[] = $product_id;

        return $statement->execute($values);
    }
}


?>