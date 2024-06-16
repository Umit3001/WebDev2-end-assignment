<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

error_reporting(E_ALL);
ini_set("display_errors", 1);

require __DIR__ . '/../vendor/autoload.php';

// Create Router instance
$router = new \Bramus\Router\Router();

$router->setNamespace('Controllers');

// routes for the products endpoint
$router->get('/products', 'ProductController@getAllProducts');
$router->get('/products/(\d+)', 'ProductController@getProductById');
$router->put('/products/(\d+)/(\d+)', 'ProductController@updateStock');
$router->put('/products/(\d+)', 'ProductController@updateProduct');
$router->post('/products', 'ProductController@createProduct');
$router->delete('/products/(\d+)', 'ProductController@deleteProduct');

// routes for the users endpoint
$router->post('/users/login', 'UserController@login');
$router->get('/users/(\w+)', 'UserController@getUserByUsername');
$router->post('/register', 'UserController@registerUser');

// routes for the comments endpoint
$router->get('/comments/(\d+)', 'ProductController@getAllComments');
$router->post('/comments', 'ProductController@insertComment');

// routes for the orders endpoint
$router->post('/orders/(\d+)', 'OrderController@createOrderFromCart');
$router->get('/orders/(\d+)', 'OrderController@getOrderWithProducts');

// routes for the carts endpoint
$router->get('/cart/(\d+)', 'CartController@getCartItems');
$router->post('/cart', 'CartController@addCartItem');
$router->delete('/cart/(\d+)', 'CartController@removeCartItem');
$router->put('/cart/(\d+)/(\d+)', 'CartController@updateCartItem');


// Run it!
$router->run();