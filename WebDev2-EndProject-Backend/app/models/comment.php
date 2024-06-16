<?php
namespace Models;

class Comment
{
    public int $comment_id;
    public int $user_id;
    public int $product_id;
    public string $comment_text;
    public string $timestamp;
}