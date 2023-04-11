<?php

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoriesQueryBuilder extends QueryBuilder
{
private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }
    public function getModel():Builder
    {
        return $this->model;
    }
    public function getCategoriesAll(): Collection
    {
        return $this->model->get();
    }
    public function getCategoriesById(int $id): Model|null
    {
        return $this->model->find($id);
    }
}
