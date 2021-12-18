<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        $categories = $this->categoryService->listCategory();
        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->categoryService->storeCategory($request->all());
        return redirect()->route('category.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $categories = $this->categoryService->listCategory();
        return view('admin.category.edit', compact('categories'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryService->updateCategory($id, $request->all());
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return redirect()->route('category.index');
    }

    public function trashed()
    {
        $this->categoryService->trashed();
        return view('admin.category.trashed');
    }
}
