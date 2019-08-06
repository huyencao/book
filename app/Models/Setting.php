<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable =  ['name', 'logo', 'address', 'phone', 'hotline', 'facebook', 'email', 'description', 'user_id', 'meta_title', 'meta_seo', 'meta_keyword'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
