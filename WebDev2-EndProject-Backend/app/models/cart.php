<?php
namespace Models;
class Cart
{
    public int $cart_id;
    public int $user_id;
    public int $product_id;
    public int $quantity;
    public string $name;
    public float $price;

}