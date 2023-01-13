<?php
namespace Tihon\Architecture\Factories;


use Tihon\Architecture\Contracts\DBConnectionInterface;
use Tihon\Architecture\Contracts\DBQueryBuilderInterface;
use Tihon\Architecture\Contracts\DBRecordInterface;
use Tihon\Architecture\Contracts\ORMFactoryInterface;
use Tihon\Architecture\Db\MySQL;
use Tihon\Architecture\ORM\MySQLDbConnection;
use Tihon\Architecture\ORM\MySQLDbQueryBuilder;
use Tihon\Architecture\ORM\MySQLDbRecord;

class MySQLORMFactory implements ORMFactoryInterface
{
    private MySQL $mySQLConnection;

    public function __construct(MySQL $mySQLConnection)
    {
        $this->mySQLConnection = $mySQLConnection;
    }

    public function createDBConnection(): DBConnectionInterface
    {
        return new MySQLDBConnection($this->mySQLConnection);
    }

    public function createDBRecord(): DBRecordInterface
    {
        return new MySqlDbRecord($this->mySQLConnection);
    }

    public function createDBQueryBuilder(): DBQueryBuilderInterface
    {
        return new MySQLDbQueryBuilder($this->mySQLConnection);
    }
}