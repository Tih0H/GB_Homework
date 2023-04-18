<?php

namespace App\QueryBuilders;


use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class SourcesQueryBuilder extends QueryBuilder
{

    private Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }
    public function getModel():Builder
    {
        return $this->model;
    }
    public function getSourcesAll(): Collection
    {
        return $this->model->get();
    }
}
