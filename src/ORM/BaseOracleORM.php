<?php

namespace Tihon\Architecture\ORM;

use Tihon\Architecture\DB\OracleSQL;

abstract class BaseOracleORM
{
    private OracleSQL $oracleConnection;

    public function __construct(OracleSQL $oracleConnection)
    {
        $this->oracleConnection = $oracleConnection;
    }

    public function getOracleConnection(): OracleSQL
    {
        return $this->oracleConnection;
    }
}