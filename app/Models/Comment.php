<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    protected $fillable =  ['name', 'email', 'content', 'star', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
