<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable =  ['name', 'slug', 'price_old', 'cate_id', 'sale', 'price_new', 'publishing_company', 'number_page', 'total', 'status', 'detail', 'thumbnail', 'image_gallery', 'hot', 'user_id', 'author', 'class_id', 'subject_id'];

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'cate_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
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
            $query->where('class_id', $request->class);
        }

        return $query;
    }

    public function scopeSubjects($query, $request)
    {
        if ($request->has('subjects')) {
            $query->where('subjects_id', $request->subjects);
        }

        return $query;
    }

    public  function comment()
    {
        return $this->hasMany(Comment::class, 'id', 'id');
    }
}
