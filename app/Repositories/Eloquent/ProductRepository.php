<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
        parent::__construct($product);
    }

    public function listFilterProduct()
    {
        $product = $this->product->with('categories')->get();
        if (request()->input('search')) {
            $search = request()->input('search');
            $product = $this->product
                ->where('name', 'like', request()->search)
                ->orWhere('desc', 'like', request()->search)
                ->orWhere('price', 'like', request()->search)
                ->get();

        }
        return $product;
    }

    public function createProduct()
    {
        return Category::all()->pluck('name', 'id');
    }

    public function storeProduct(array $data)
    {
        return request()->user()->productCreated()->create($data);
    }

    public function updateProduct(array $data, $id)
    {
        $product = $this->product->find($id);
        return $product->update($data);
    }

    public function deleteProduct($id)
    {
        $productdelete = $this->product->destroy($id);
        if ($productdelete) {
            $this->product->withTrashed()->find($id)->update([
                'by_deleted' => \auth()->id()
            ]);
        }
        return $productdelete;
    }

    public function trashed()
    {
        return $this->product->onlyTrashed()->get();
    }
}
