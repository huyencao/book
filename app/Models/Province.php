<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'vn_province';

    protected $primaryKey = 'provinceid';

    protected $fillable = ['provinceid', 'name', 'type'];

//    protected  $incrementing = false;

    public function district()
    {
        return $this->hasMany(District::class, 'provinceid', 'provinceid');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'provinceid', 'provinceid');
    }
}
