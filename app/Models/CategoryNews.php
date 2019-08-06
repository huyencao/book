<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CategoryNews extends Model
{
    protected $table = 'category_news';

    protected $fillable = ['title', 'slug', 'parent_id', 'status', 'user_id'];

    public function news()
    {
        return $this->hasMany(News::class, 'id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
