<?php

namespace Tihon\Architecture\ORM;

use Tihon\Architecture\Contracts\DBConnectionInterface;

class MySQLDBConnection extends BaseMySQLORM implements DBConnectionInterface
{

    public function connectionStatus()
    {
        echo 'Этот сервис работает с MySQL' . PHP_EOL;
    }

    public function closeConnection()
    {
        // TODO: Implement closeConnection() method.
    }
}