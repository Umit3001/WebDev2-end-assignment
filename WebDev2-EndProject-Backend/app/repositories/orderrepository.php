<?php
namespace Repositories;
use Models\Order;
use PDO;

class OrderRepository extends Repository
{
    public function createOrder(Order $order) {
        $statement = $this->connection->prepare('INSERT INTO orders (user_id, status) VALUES (:user_id, :status)');
        $statement->bindParam(':user_id', $order->user_id);
        $statement->bindParam(':status', $order->status);
        $statement->execute();
        return $this->connection->lastInsertId();
    }

    public function getOrderWithProducts(int $user_id) {
        $statement = $this->connection->prepare('
        SELECT orders.*, products.product_id AS product_id, products.name AS name, products.price AS price, products.description AS description, order_items.quantity AS quantity
        FROM orders
        INNER JOIN order_items ON orders.order_id = order_items.order_id
        INNER JOIN products ON order_items.product_id = products.product_id
        WHERE orders.user_id = :user_id
    ');
        $statement->bindParam(':user_id', $user_id);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        $orders = [];
        foreach ($rows as $row) {
            $orderId = $row['order_id'];
            if (!isset($orders[$orderId])) {
                $orders[$orderId] = [
                    'order_id' => $orderId,
                    'order_date' => $row['order_date'],
                    'status' => $row['status'],
                    'items' => [],
                ];
            }
            $orders[$orderId]['items'][] = [
                'product_id' => $row['product_id'],
                'name' => $row['name'],
                'price' => $row['price'],
                'description' => $row['description'],
                'quantity' => $row['quantity'],
            ];
        }

        return array_values($orders);
    }

}