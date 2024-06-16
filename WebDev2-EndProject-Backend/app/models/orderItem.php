<?php
namespace Models;
class OrderItem
{
    public int $order_item_id;
    public int $order_id;
    public int $product_id;
    public int $quantity;

}