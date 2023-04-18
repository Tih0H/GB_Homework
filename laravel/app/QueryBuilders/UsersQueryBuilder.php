<?php

namespace App\QueryBuilders;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UsersQueryBuilder extends QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }
    public function getModel():Builder
    {
        return $this->model;
    }
    public function getUsersAll(): Collection
    {
        return $this->model->get();
    }
}
