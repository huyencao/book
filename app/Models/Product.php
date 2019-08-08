<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =  ['name', 'slug', 'price_old', 'cate_id', 'sale', 'price_new', 'publishing_company', 'number_page', 'total', 'status', 'detail', 'class', 'subjects', 'thumbnail', 'image_gallery', 'hot', 'user_id'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'cate_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //search
    public function scopeName($query, $request)
    {
        if ($request->has('name')) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        return $query;
    }

    public function scopeClass($query, $request)
    {
        if ($request->has('class')) {
            $query->where('class', $request->class);
        }

        return $query;
    }

    public function scopeSubjects($query, $request)
    {
        if ($request->has('subjects')) {
            $query->where('subjects', $request->subjects);
        }

        return $query;
    }

    public  function comment()
    {
        return $this->hasMany(Comment::class, 'id', 'id');
    }
}
