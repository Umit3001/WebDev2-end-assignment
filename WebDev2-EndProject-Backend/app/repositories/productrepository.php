<?php

namespace Repositories;
use Models\Product;

use PDO;
use PDOException;
use Repositories\Repository;

class ProductRepository extends Repository {

    public function getAllProducts() {
    $statement = $this->connection->prepare('SELECT * FROM products');
    $statement->execute();

    $products = $statement->fetchAll(PDO::FETCH_CLASS, 'Models\Product');

    return $products;
    }

    public function getProductById($id) {
        $statement = $this->connection->prepare('SELECT * FROM products WHERE product_id = :product_id');
        $statement->execute(['product_id' => $id]);

        $product = $statement->fetchObject('Models\Product');

        return $product;
    }

    public function updateStock($product_id, $newStock) {
        $statement = $this->connection->prepare('UPDATE products SET stock = :stock WHERE product_id = :product_id');
        $statement->bindParam('stock', $newStock);
        $statement->bindParam('product_id', $product_id);
        $statement->execute();
    }

    public function getAllComments($product_id) {
        $statement = $this->connection->prepare('SELECT * FROM comments WHERE product_id = :product_id ORDER BY timestamp DESC');
        $statement->execute(['product_id' => $product_id]);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertComment($comment) {
        $statement = $this->connection->prepare('INSERT INTO comments (user_id, product_id, comment_text) VALUES (:user_id, :product_id, :comment_text)');
        $statement->bindParam(':user_id', $comment->user_id);
        $statement->bindParam(':product_id', $comment->product_id);
        $statement->bindParam(':comment_text', $comment->comment_text);
        $statement->execute();
    }

    public function updateProduct(Product $product) {
        $statement = $this->connection->prepare('UPDATE products SET name = :name, price = :price, description = :description, stock = :stock, image = :image WHERE product_id = :product_id');
        $statement->bindParam(':name', $product->name);
        $statement->bindParam(':price', $product->price);
        $statement->bindParam(':description', $product->description);
        $statement->bindParam(':stock', $product->stock);
        $statement->bindParam(':product_id', $product->product_id);
        $statement->bindParam(':image', $product->image);
        $statement->execute();

    }

    public function createProduct(Product $product) {
        $statement = $this->connection->prepare('INSERT INTO products (name, price, description, stock, image) VALUES (:name, :price, :description, :stock, :image)');
        $statement->bindParam(':name', $product->name);
        $statement->bindParam(':price', $product->price);
        $statement->bindParam(':description', $product->description);
        $statement->bindParam(':stock', $product->stock);
        $statement->bindParam(':image', $product->image);
        $statement->execute();
    }

    public function deleteProduct($product_id) {
        $statement = $this->connection->prepare('DELETE FROM products WHERE product_id = :product_id');
        $statement->bindParam(':product_id', $product_id);
        $statement->execute();
    }
}
