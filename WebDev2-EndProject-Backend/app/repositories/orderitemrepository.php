<?php
namespace Repositories;
use Models\OrderItem;
use PDO;

class OrderItemRepository extends Repository
{
    public function createOrderItem(OrderItem $orderItem) {
        $statement = $this->connection->prepare('INSERT INTO order_items (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)');
        $statement->bindParam(':order_id', $orderItem->order_id);
        $statement->bindParam(':product_id', $orderItem->product_id);
        $statement->bindParam(':quantity', $orderItem->quantity);
        $statement->execute();
    }
}