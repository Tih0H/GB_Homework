<?php

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsQueryBuilder extends QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }
    public function getModel():Builder
    {
        return $this->model;
    }
    public function getNewsAllWithPagination(int $quantity=10): LengthAwarePaginator
    {
        return $this->model->with('categories')->paginate($quantity);
    }

    public function getNewsById(int $id): Model|null
    {
        return $this->model->find($id);
    }

}
