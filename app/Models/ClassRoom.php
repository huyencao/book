<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'class_room';

    protected $fillable =  ['name', 'status', 'user_id'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
