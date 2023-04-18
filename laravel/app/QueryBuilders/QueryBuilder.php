<?php

namespace App\QueryBuilders;


use Illuminate\Database\Eloquent\Builder;

abstract class QueryBuilder
{
    abstract function getModel():Builder;

}
