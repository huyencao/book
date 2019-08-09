<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable =  ['fullname', 'phone', 'email', 'province', 'district', 'payment_method', 'order_cart'];

    public function district()
    {
        return $this->belongsTo(District::class, 'provinceid', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'districtid', 'id');
    }
}
