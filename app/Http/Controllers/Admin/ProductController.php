<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index()
    {
        $products = $this->productService->listFilterProduct();
        $categories = $this->productService->createProduct();
        return view('admin.product.index', compact('products', 'categories'));
    }

    public function create()
    {
        //
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->storeProduct($request->all());
        $product->categories()->sync($request->input('categories', []));
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product=$this->productService->updateProduct($request->all(), $id);
        $product->categories()->sync($request->input('categories', []));
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return redirect()->route('product.index');
    }

    public function trashed()
    {
        $products = $this->productService->trashed();
        return view('admin.product.trashed', compact('products'));
    }
}
