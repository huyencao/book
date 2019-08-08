<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'vn_district';

    protected $primaryKey = 'districtid';

    protected $fillable = ['districtid', 'name', 'type', 'location', 'provinceid'];

    protected  $incrementing = false;

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinceid', 'districtid');
    }

}
