<?php


namespace App\Services;


use App\Repositories\Eloquent\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function listFilterProduct()
    {
        return $this->productRepository->listFilterProduct();
    }

    public function createProduct()
    {
        return $this->productRepository->createProduct();
    }

    public function storeProduct(array $data)
    {
        return $this->productRepository->storeProduct($data);
    }

    public function updateProduct(array $data, $id)
    {
        return $this->productRepository->updateProduct($data, $id);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }

    public function trashed()
    {
        return $this->productRepository->trashed();
    }
}
