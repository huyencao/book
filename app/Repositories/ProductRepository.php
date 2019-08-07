<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Product;

class ProductRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Product::class;
    }

    public function listProductHot()
    {
        $product = Product::where('hot', 1)->limit(config('app.product_hot'))->orderBy('id', 'DESC' )->get();

        return $product;
    }

    public function listProduct()
    {
        $list_product = Product::where('status', 1)->paginate(config('app.paginate_product'));

        return $list_product;
    }

    public function listProductAdmin()
    {
        $list_product = Product::get();

        return $list_product;
    }

    public function detailProduct($slug)
    {
        $data = Product::where('slug', $slug)->get();

        return $data;
    }

    public function listRelatedProducts($slug)
    {
        $data = Product::with('categoryProduct')->where('slug', $slug   )->limit(config('app.related_product'))->get();

        return $data;
    }

    public function findProduct($id)
    {
        $data = Product::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}
