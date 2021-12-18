<?php

namespace App\Repositories\Eloquent;



use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;



class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
        parent::__construct($category);
    }

    public function listCategory()
    {
        return $this->category->with('children')->root()->get();
    }

    public function storeCategory(array $data)
    {
        return request()->user()-> categoryCreated()->create($data);
    }

    public function updateCategory(array $data, $id)
    {
        $category = $this->category->find($id);
        return $category->update($data);
    }

    public function deleteCategory($id)
    {
        $categorydelete = $this->category->destroy($id);
        if ($categorydelete) {
            $this->category->withTrashed()->find($id)->update([
                'by_deleted' => \auth()->id()
            ]);
        }
        return $categorydelete;
    }
    public function trashed(){
        $this->category->onlyTrashed()->get();
    }

}
