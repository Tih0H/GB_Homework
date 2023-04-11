<?php

namespace App\QueryBuilders;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FeedbacksQueryBuilder extends QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Feedback::query();
    }
    public function getModel():Builder
    {
        return $this->model;
    }
    public function getFeedbacksAll(): Collection
    {
        return $this->model->get();
    }
}
