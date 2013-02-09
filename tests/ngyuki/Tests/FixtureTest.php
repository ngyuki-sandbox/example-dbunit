<?php
namespace ngyuki\Tests;

class FixtureTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $pdo = new \PDO(getenv('PHPUNIT_DSN'), getenv('PHPUNIT_USER'), getenv('PHPUNIT_PASS'));
        $connection = new \PHPUnit_Extensions_Database_DB_DefaultDatabaseConnection($pdo);

        $dataset = new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(PHPUNIT_FILES . '/sample.yaml');

        $op = new \PHPUnit_Extensions_Database_Operation_Composite(array(
            new \PHPUnit_Extensions_Database_Operation_Delete(),
            new \PHPUnit_Extensions_Database_Operation_Insert(),
        ));

        $op->execute($connection, $dataset);
    }

    public function test()
    {
        $this->assertTrue(true);
    }
}
