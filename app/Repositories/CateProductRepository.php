<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\CategoryProduct;

class CateProductRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\CategoryProduct::class;
    }

    public function listCateProduct()
    {
        $data = CategoryProduct::with('user')->get();

        return $data;
    }

    public function listCateParent()
    {
        $data = CategoryProduct::where('parent_id', 0)->get();

        return $data;
    }

    public function findCate($id)
    {
        $data = CategoryProduct::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}
