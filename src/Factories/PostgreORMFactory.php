<?php

namespace Tihon\Architecture\Factories;

use Tihon\Architecture\Contracts\DBConnectionInterface;
use Tihon\Architecture\Contracts\DBQueryBuilderInterface;
use Tihon\Architecture\Contracts\DBRecordInterface;
use Tihon\Architecture\Contracts\ORMFactoryInterface;
use Tihon\Architecture\DB\PostgreSQL;
use Tihon\Architecture\ORM\PostgreDBConnection;
use Tihon\Architecture\ORM\PostgreDBQueryBuilder;
use Tihon\Architecture\ORM\PostgreDBRecord;

class PostgreORMFactory implements ORMFactoryInterface
{
    private PostgreSQL $postgreConnection;

    public function __construct(PostgreSQL $postgreConnection)
    {
        $this->postgreConnection = $postgreConnection;
    }

    public function createDBConnection(): DBConnectionInterface
    {
        return new PostgreDBConnection($this->postgreConnection);
    }

    public function createDBRecord(): DBRecordInterface
    {
        return new PostgreDBRecord($this->postgreConnection);
    }

    public function createDBQueryBuilder(): DBQueryBuilderInterface
    {
        return new PostgreDBQueryBuilder($this->postgreConnection);
    }
}