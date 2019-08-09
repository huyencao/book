<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Contact;

class ContactRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Contact::class;
    }

    public function listContact()
    {
        $data = Contact::all();

        return $data;
    }

}
