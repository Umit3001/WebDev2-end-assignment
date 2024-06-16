<?php
namespace Services;
use Repositories\CartRepository;
use Models\Cart;

class CartService
{
    private $repository;

    function __construct()
    {
        $this->repository = new CartRepository();
    }

    public function getCartItems(int $user_id) {
        return $this->repository->getCartItems($user_id);
    }

    public function addCartItem(Cart $cartItem) {
       return $this->repository->addCartItem($cartItem);
    }

    public function removeCartItem(int $cart_id) {
        return $this->repository->removeCartItem($cart_id);
    }

    public function updateCartItem(int $cart_id, int $quantity) {
        return $this->repository->updateCartItem($cart_id, $quantity);
    }

    public function clearCart(int $user_id) {
        return $this->repository->clearCart($user_id);
    }

}