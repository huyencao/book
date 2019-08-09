<?php
namespace App\Repositories;

use App\Models\District;
use App\Repositories\EloquentRepository;
use App\Models\Province;

class CheckoutRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Province::class;
    }

    public function listProvince()
    {
        $data = Province::orderBy('name', 'ASC')->get();

        return $data;
    }

    public function listDistrict($province_id)
    {
        $data = District::where('provinceid', $province_id)->get();

        return $data;
    }
}
