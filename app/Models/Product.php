<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =  ['name', 'price_old', 'cate_id', 'sale', 'price_new', 'publishing_company', 'number_page', 'total', 'status', 'detail', 'class', 'subjects', 'thumbnail', 'hot', 'user_id'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'cate_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
