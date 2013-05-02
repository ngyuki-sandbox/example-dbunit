<?php
namespace ngyuki\Tests;

abstract class TestCase extends \PHPUnit_Extensions_Database_TestCase
{
    public static $pdo;

    protected function getConnection()
    {
        if (self::$pdo === null)
        {
            self::$pdo = new \PDO(getenv('PHPUNIT_DSN'), getenv('PHPUNIT_USER'), getenv('PHPUNIT_PASS'));
        }

        $conn = $this->createDefaultDBConnection(self::$pdo);

        return $conn;
    }

    protected function getSetUpOperation()
    {
        return new \PHPUnit_Extensions_Database_Operation_Composite(array(
            new \PHPUnit_Extensions_Database_Operation_DeleteAll(),
            new \PHPUnit_Extensions_Database_Operation_Insert(),
        ));
    }
}
