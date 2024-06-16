<?php
namespace Models;
class Order {
    public int $order_id;
    public int $user_id;
    public string $order_date;
    public string $status;
}