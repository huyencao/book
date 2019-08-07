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
        $setting = Setting::with('user')->get();

        return $setting;
    }

    public function infoSetting()
    {
        $data = Setting::find(2);

        return $data;
    }

    public function findSetting($id){

        $data = Setting::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }
}