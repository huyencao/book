<?php
namespace App\Repositories;
use App\Repositories\EloquentRepository;
use App\Models\Setting;

class SettingRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Setting::class;
    }

    public function settingSelect()
    {
        $setting = Setting::all();

        return $setting;
    }
}