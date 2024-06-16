<?php
namespace Services;

use Repositories\OrderRepository;
use Repositories\OrderItemRepository;
use Models\OrderItem;
use Models\Order;

class OrderService {
     private $orderRepository;
     private $orderItemRepository;

     function __construct()
     {
         $this->orderRepository = new OrderRepository();
         $this->orderItemRepository = new OrderItemRepository();
     }

        public function createOrder(Order $order) {
            return $this->orderRepository->createOrder($order);
        }

        public function createOrderItem(OrderItem $orderItem) {
            $this->orderItemRepository->createOrderItem($orderItem);
        }

        public function getOrderWithProducts(int $user_id) {
            return $this->orderRepository->getOrderWithProducts($user_id);
        }


}