<?php
namespace Services;

use Repositories\ProductRepository;

class ProductService {

    private $repository;

    function __construct()
    {
        $this->repository = new ProductRepository();
    }

   public function getAllProducts() {
        return $this->repository->getAllProducts();
    }

    public function getProductById($id) {
        return $this->repository->getProductById($id);
    }

    public function updateStock($product_id, $newStock) {
        return $this->repository->updateStock($product_id, $newStock);
    }

    public function getAllComments($product_id) {
        return $this->repository->getAllComments($product_id);
    }

    public function insertComment($comment) {
        return $this->repository->insertComment($comment);
    }

    public function updateProduct($product) {
        return $this->repository->updateProduct($product);
    }

    public function createProduct($product) {
        return $this->repository->createProduct($product);
    }

    public function deleteProduct($product_id) {
        return $this->repository->deleteProduct($product_id);
    }
}

?>