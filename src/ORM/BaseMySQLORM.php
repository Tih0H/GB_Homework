<?php
namespace Tihon\Architecture\ORM;


use Tihon\Architecture\DB\MySQL;

abstract class BaseMySQLORM
{
    private MySQL $mySQLConnection;

    public function __construct(MySQL $mySQLConnection)
    {
        $this->mySQLConnection = $mySQLConnection;
    }

    public function getMySQLConnection(): MySQL
    {
        return $this->mySQLConnection;
    }
}