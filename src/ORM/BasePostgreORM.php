<?php

namespace Tihon\Architecture\ORM;

use Tihon\Architecture\DB\PostgreSQL;

abstract class BasePostgreORM
{
    private PostgreSQL $postgreConnection;

    public function __construct(PostgreSQL $postgreConnection)
    {
        $this->postgreConnection = $postgreConnection;
    }

    public function getPostgreConnection(): PostgreSQL
    {
        return $this->postgreConnection;
    }
}