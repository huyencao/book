<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Menu;

class MenuRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Menu::class;
    }
    public function listMenu()
    {
        return Menu::where('status', 1)->get();
    }

    public function findMenu($id)
    {
        $data = Menu::findOrFail($id);
        if (empty($data)) {
            return false;
        } else {
            return $data;
        }
    }
}