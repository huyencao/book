<?php
namespace App\Repositories;

use App\Models\CategoryNews;
use App\Repositories\EloquentRepository;
use App\Models\Order;

class OrderRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Order::class;
    }

    public function listOrder()
    {
        $order = Order::orderBy('id', 'DESC' )->get();

        return $order;
    }
}
