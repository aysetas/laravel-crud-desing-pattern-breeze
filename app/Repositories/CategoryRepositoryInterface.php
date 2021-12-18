<?php


namespace App\Repositories;


interface CategoryRepositoryInterface
{
    public function listCategory();

    public function storeCategory(array $data);

    public function updateCategory(array $data, $id);

    public function deleteCategory($id);

    public function trashed();

}
