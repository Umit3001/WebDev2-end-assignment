<?php
namespace Repositories;
use Models\Cart;
use PDO;
use PDOException;

class CartRepository extends Repository
{
    public function getCartItems(int $user_id) {
        $statement = $this->connection->prepare("
        SELECT cart.*, products.name AS name, products.price AS price
        FROM cart
        INNER JOIN products ON cart.product_id = products.product_id
        WHERE cart.user_id = :user_id
    ");
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, 'Models\Cart');
    }

    public function addCartItem(Cart $cartItem) {
        $statement = $this->connection->prepare('INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)');
        $statement->bindParam(':user_id', $cartItem->user_id);
        $statement->bindParam(':product_id', $cartItem->product_id);
        $statement->bindParam(':quantity', $cartItem->quantity);
        return $statement->execute();

    }

    public function removeCartItem(int $cart_id) {
        $statement = $this->connection->prepare('DELETE FROM cart WHERE cart_id = :cart_id');
        $statement->bindParam(':cart_id', $cart_id);
        return $statement->execute();

    }

    public function updateCartItem(int $cart_id, int $quantity) {
        $statement = $this->connection->prepare('UPDATE cart SET quantity = :quantity WHERE cart_id = :cart_id');
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':cart_id', $cart_id);
        return $statement->execute();
    }

    public function clearCart(int $user_id) {
        $statement = $this->connection->prepare('DELETE FROM cart WHERE user_id = :user_id');
        $statement->bindParam(':user_id', $user_id);
        return $statement->execute();
    }



}