<?php

namespace Controllers;

use Exception;
use Services\ProductService;

class ProductController extends Controller
{
    private $service;

    // initialize services
    function __construct()
    {
        $this->service = new ProductService();
    }

    public function getAllProducts()
    {

        $products = $this->service->getAllProducts();

        $this->respond($products);
    }

    public function getProductById($id)
    {
        $product = $this->service->getProductById($id);

        if (!$product) {
            $this->respondWithError(404, "Product not found");
            return;
        }

        $this->respond($product);
    }

    public function updateStock($product_id, $newStock)
    {
        $this->checkForJwt();

        $product = $this->service->getProductById($product_id);

        if (!$product) {
            $this->respondWithError(404, "Product not found");
            return;
        }

        $this->service->updateStock($product_id, $newStock);

        $this->respond("Stock updated");
    }

    public function getAllComments($product_id)
    {
        $comments = $this->service->getAllComments($product_id);

        $this->respond($comments);
    }

    public function insertComment()
    {

        $this->checkForJwt();

        $comment = $this->createObjectFromPostedJson("Models\\Comment");

        $this->service->insertComment($comment);

        $this->respond("Comment inserted");
    }

    public function updateProduct($product_id)
{
    $this->checkForJwt();

    $product = $this->createObjectFromPostedJson("Models\\Product");
    $product->product_id = $product_id;

    $this->service->updateProduct($product);

    $this->respond("Product updated");
}

    public function createProduct()
    {
        $this->checkForJwt();

        $product = $this->createObjectFromPostedJson("Models\\Product");

        $this->service->createProduct($product);

        $this->respond("Product created");
    }

    public function deleteProduct($product_id)
    {
        $this->checkForJwt();

        $product = $this->service->getProductById($product_id);

        if (!$product) {
            $this->respondWithError(404, "Product not found");
            return;
        }

        $this->service->deleteProduct($product_id);

        $this->respond("Product deleted");
    }


}
