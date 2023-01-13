<?php

namespace Devavi\Architecture\Services;


use Tihon\Architecture\Contracts\ORMFactoryInterface;

class ORMService
{
    private $dbConnection;
    private $dbRecord;
    private $dbQueryBuilder;

    public function __construct(ORMFactoryInterface $ORMFactory)
    {
        $this->dbConnection = $ORMFactory->createDBConnection();
        $this->dbRecord = $ORMFactory->createDBRecord();
        $this->dbQueryBuilder = $ORMFactory->createDBQueryBuilder();
    }

    public function closeConnection()
    {
        $this->dbConnection->closeConnection();
    }

    public function connectionInfo()
    {
        $this->dbConnection->connectionStatus();
    }

    public function getAll()
    {
        $this->dbQueryBuilder->getAll();
    }

    public function insert()
    {
        $this->dbRecord->insertOne();
    }
}