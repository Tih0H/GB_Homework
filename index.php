<?php

use Tihon\Architecture\DB\MySQL;
use Tihon\Architecture\DB\OracleSQL;
use Tihon\Architecture\DB\PostgreSQL;
use Tihon\Architecture\Factories\MySQLORMFactory;
use Tihon\Architecture\Factories\OracleORMFactory;
use Tihon\Architecture\Factories\PostgreORMFactory;
use Tihon\Architecture\Services\ORMService;

function load($className)
{
    var_dump($className);
    $file = $className . ".php";
    $nameSpace = "Tihon\Architecture";
    $file = str_replace($nameSpace, "src", $file);
    $file = str_replace("\\", "/", $file);
    $file = str_replace("_", "/", $file);
    if (file_exists($file)) {
        var_dump($file);
        include $file;
    }
};


$postgreFactory = new PostgreORMFactory(new PostgreSQL());
$postgreORM = new ORMService($postgreFactory);
$postgreORM->connectionInfo();
$postgreORM->getAll();
$postgreORM->insert();

$oracleFactory = new OracleORMFactory(new OracleSQL());
$oracleORM = new ORMService($oracleFactory);
$oracleORM->connectionInfo();
$oracleORM->getAll();
$oracleORM->insert();

$mySQLFactory = new MySQLORMFactory(new MySQL());
$mySQLORM = new ORMService($mySQLFactory);
$mySQLORM->connectionInfo();
$mySQLORM->getAll();
$mySQLORM->insert();
