<?php

namespace OrmTest\Test\Utilities;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\TestCase;

abstract class DbTestCase extends TestCase
{
    protected static $dbal;
    protected static $pdo;
    protected static $entityManager;
    protected $conn;

    /**
     * Returns the test database connection.
     *
     * @return Connection
     */
    protected function getConnection()
    {
        if ($this->conn === null) {
            if (DbTestCase::$pdo === null) {
                DbTestCase::$pdo = new \PDO(DB_DSN);
            }
            $this->conn = $this->createDefaultDBConnection(DbTestCase::$pdo);
        }
        return $this->conn;
//        $config = Yaml::parse(file_get_contents(CONFIG_DIR));
//        $mapping = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
//            ENTITY_PATHS,
//            true,
//            null,
//            null,
//            false
//        );
//        $entityManager = \Doctrine\ORM\EntityManager::create($config['database'], $mapping);
    }

    protected function getPdo()
    {
        return $this->getConnection()->getConnection();
    }

    protected function getDbal()
    {
        if (DbTestCase::$dbal === null) {
            DbTestCase::$dbal = DriverManager::getConnection(['pdo' => $this->getPdo()]);
        }
        return DbTestCase::$dbal;
    }

    protected function getEntityManager()
    {
        if(DbTestCase::$entityManager === null) {
            DbTestCase::$entityManager = EntityManager::create($this->getDbal(), $this->getDbConfig());
        }
        return DbTestCase::$entityManager;
    }

    private function getDbConfig()
    {
        return Setup::createAnnotationMetadataConfiguration(ENTITY_PATHS, true, null, null, false);
    }
}
