<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable =  ['name'];

    public function district()
    {
        return $this->hasMany(District::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
