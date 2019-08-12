<?php
namespace App\Repositories;

use App\Models\ClassRoom;
use App\Repositories\EloquentRepository;

class ClassRoomRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\ClassRoom::class;
    }

    public function listClassRoom()
    {
        $data = ClassRoom::get();

        return $data;
    }
    public function activeClassRoom()
    {
        $data = ClassRoom::where('status', 1)->get();

        return $data;
    }


    public function findClassRoom($id)
    {
        $data = ClassRoom::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }

}
