<?php

namespace Tihon\Architecture\Factories;

use Tihon\Architecture\Contracts\DBConnectionInterface;
use Tihon\Architecture\Contracts\DBQueryBuilderInterface;
use Tihon\Architecture\Contracts\DBRecordInterface;
use Tihon\Architecture\Contracts\ORMFactoryInterface;
use Tihon\Architecture\DB\Oracle;
use Tihon\Architecture\ORM\OracleDBConnection;
use Tihon\Architecture\ORM\OracleDBQueryBuilder;
use Tihon\Architecture\ORM\OracleDBRecord;

class OracleORMFactory implements ORMFactoryInterface
{
    private Oracle $oracleConnection;

    public function __construct(Oracle $oracleConnection)
    {
        $this->oracleConnection = $oracleConnection;
    }

    public function createDBConnection(): DBConnectionInterface
    {
        return new OracleDBConnection($this->oracleConnection);
    }

    public function createDBRecord(): DBRecordInterface
    {
        return new OracleDBRecord($this->oracleConnection);
    }

    public function createDBQueryBuilder(): DBQueryBuilderInterface
    {
        return new OracleDBQueryBuilder($this->oracleConnection);
    }
}