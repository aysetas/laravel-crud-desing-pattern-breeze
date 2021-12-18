<?php


namespace App\Services;

use App\Repositories\Eloquent\CategoryRepository;
use Illuminate\Http\Request;


class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function listCategory()
    {
        return $this->categoryRepository->listCategory();
    }

    public function storeCategory(array $data)
    {
        return $this->categoryRepository->storeCategory($data);
    }

    public function updateCategory(array $data, $id)
    {
        return $this->categoryRepository->updateCategory($data, $id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->deleteCategory($id);
    }

    public function trashed()
    {
        return $this->categoryRepository->trashed();
    }
}
