<?php

namespace Tihon\Architecture\ORM;

use Tihon\Architecture\Contracts\DBConnectionInterface;

class PostgreDBConnection extends BasePostgreORM implements DBConnectionInterface
{

    public function connectionStatus()
    {
        echo 'Этот сервис работает с PostgreSQL' . PHP_EOL;
    }

    public function closeConnection()
    {
        // TODO: Implement closeConnection() method.
    }
}