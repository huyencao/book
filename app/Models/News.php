<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable =  ['title', 'slug', 'cate_id', 'description', 'content', 'thumbnail', 'author', 'status', 'hot', 'user_id'];

    public function categoryNews()
    {
        return $this->belongsTo('App\Models\CategoryNews', 'cate_id', 'id');
    }

    public function  user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
