<?php

namespace Tihon\Architecture\ORM;

use Tihon\Architecture\Contracts\DBRecordInterface;

class PostgreDBRecord extends BasePostgreORM implements DBRecordInterface
{

    public function getOne()
    {
        // TODO: Implement getOne() method.
    }

    public function insertOne()
    {
        echo 'Добавляю запись в таблицу PostgreSQL базы данных' . PHP_EOL;
    }

    public function updateOne()
    {
        // TODO: Implement updateOne() method.
    }

    public function deleteONe()
    {
        // TODO: Implement deleteONe() method.
    }
}