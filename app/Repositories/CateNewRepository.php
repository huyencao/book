<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\CategoryNews;

class CateNewRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\CategoryNews::class;
    }

    public function listCateNews()
    {
        $data = CategoryNews::with('user')->get();

        return $data;
    }

    public function listCateParent()
    {
        $data = CategoryNews::where('parent_id', 0)->where('status', 1)->get();

        return $data;
    }

    public function findCate($id)
    {
        $data = CategoryNews::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}
