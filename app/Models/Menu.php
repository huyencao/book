<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable =  ['title', 'slug', 'link', 'parent_id', 'status', 'user_id', 'position'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
