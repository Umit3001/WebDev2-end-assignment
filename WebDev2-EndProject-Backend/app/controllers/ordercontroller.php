<?php

namespace Controllers;

use Models\OrderItem;
use Models\Order;
use Services\OrderService;
use Services\CartService;

class OrderController extends Controller
{
    private $orderService;
    private $cartService;

    function __construct()
    {
        $this->orderService = new OrderService();
        $this->cartService = new CartService();
    }

    public function createOrderFromCart(int $user_id) {

        $this->checkForJwt();

        $cartItems = $this->cartService->getCartItems($user_id);

        $order = new Order();
        $order->user_id = $user_id;
        $order->status = 'confirmed';

        $order_id = $this->orderService->createOrder($order);

        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order_id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;

            $this->orderService->createOrderItem($orderItem);
        }

        $this->cartService->clearCart($user_id);
    }

    public function getOrderWithProducts(int $user_id) {

        $this->checkForJwt();

        $order = $this->orderService->getOrderWithProducts($user_id);
        if (!$order) {
            $this->respondWithError(404, "Order not found");
            return;
        }
        $this->respond($order);
    }

}