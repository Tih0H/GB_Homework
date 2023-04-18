<?php

namespace App\QueryBuilders;


use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrdersQueryBuilder extends QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Order::query();
    }
    public function getModel():Builder
    {
        return $this->model;
    }
    public function getOrdersAll(): Collection
    {
        return $this->model->get();
    }
    public function getOrderById(int $id): Model|null
    {
        return $this->model->find($id);
    }
}

