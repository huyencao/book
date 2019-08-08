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
        $item  = Product::where('slug', $slug)->first();
        $cate_id = $item->cate_id;
        $data = Product::with('categoryProduct')->where('cate_id', $cate_id)->limit(config('app.related_product'))->get();

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

    public function listClass(){
        $data = Product::where('status', 1)->select('class')->get();

        return $data;
    }

    public function listSubject(){
        $data = Product::where('status', 1)->select('subjects')->get();

        return $data;
    }

}
