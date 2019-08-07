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
        return Menu::with('user')->where('status', 1)->orderBy('position', 'ASC')->get();
    }

    public function listMenuAll()
    {
        return Menu::with('user')->get();
    }

    public function listMenuParent()
    {
        return  Menu::where('parent_id', 0)->get();
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