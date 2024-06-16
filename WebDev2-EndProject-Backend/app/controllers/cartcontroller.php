<?php
namespace Controllers;
use Models\Cart;
use Services\CartService;

class CartController extends Controller
{
    private $service;

    function __construct()
    {
        $this->service = new CartService();
    }

    public function getCartItems(int $user_id) {

        $this->checkForJwt();

        $cartItems = $this->service->getCartItems($user_id);
        if (!$cartItems) {
            $this->respondWithError(404, "Cart items not found");
            return;
        }
        $this->respond($cartItems);
    }

    public function addCartItem() {

        $this->checkForJwt();

        $cart = $this->createObjectFromPostedJson("Models\\Cart");

        $result = $this->service->addCartItem($cart);
        if (!$result) {
            $this->respondWithError(500, "Failed to add item to cart");
            return;
        }
        $this->respond("Item added to cart");
    }

    public function removeCartItem(int $cart_id) {

        $this->checkForJwt();

        $result = $this->service->removeCartItem($cart_id);
        if (!$result) {
            $this->respondWithError(500, "Failed to remove item from cart");
            return;
        }
        $this->respond("Item removed from cart");
    }

    public function updateCartItem(int $cart_id, int $quantity) {

        $this->checkForJwt();

        $result = $this->service->updateCartItem($cart_id, $quantity);
        if (!$result) {
            $this->respondWithError(500, "Failed to update item in cart");
            return;
        }
        $this->respond("Item updated in cart");
    }

    public function clearCart(int $user_id) {

        $this->checkForJwt();

        $result = $this->service->clearCart($user_id);
        if (!$result) {
            $this->respondWithError(500, "Failed to clear cart");
            return;
        }
        $this->respond("Cart cleared");
    }

}