<?php
namespace App\Repositories;

use App\Models\ClassRoom;
use App\Models\Subject;
use App\Repositories\EloquentRepository;

class SubjectReposiory extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Subject::class;
    }

    public function listClassRoom()
    {
        $data = Subject::get();

        return $data;
    }

    public function activeSubject()
    {
        $data = Subject::where('status', 1)->get();

        return $data;
    }

    public function findSubject($id)
    {
        $data = Subject::find($id);
        if ($data == null) {
            return false;
        } else {
            return $data;
        }
    }

}
