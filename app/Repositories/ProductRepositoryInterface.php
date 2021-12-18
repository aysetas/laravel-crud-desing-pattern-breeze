<?php


namespace App\Repositories;


interface ProductRepositoryInterface
{
    public function listFilterProduct();

    public function createProduct();

    public function storeProduct(array $data);

    public function updateProduct(array $data, $id);

    public function deleteProduct($id);

    public function trashed();
}
