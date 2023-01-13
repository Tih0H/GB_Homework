<?php

namespace Tihon\Architecture\ORM;

use Tihon\Architecture\Contracts\DBQueryBuilderInterface;

class OracleDBQueryBuilder extends BaseOracleORM implements DBQueryBuilderInterface
{

    public function getAll()
    {
        echo 'Получаю все файлы из таблицы в Oracle базе данных' . PHP_EOL;
    }

    public function getAllWhere()
    {
        // TODO: Implement getAllWhere() method.
    }

    public function getAllWhereIn()
    {
        // TODO: Implement getAllWhereIn() method.
    }
}