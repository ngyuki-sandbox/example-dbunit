<?php
namespace ngyuki\Tests;

class YamlDataSetTest extends \PHPUnit_Extensions_Database_TestCase
{
    protected function getConnection()
    {
        $pdo = new \PDO(getenv('PHPUNIT_DSN'), getenv('PHPUNIT_USER'), getenv('PHPUNIT_PASS'));
        $conn = $this->createDefaultDBConnection($pdo);

        return $conn;
    }

    protected function getSetUpOperation()
    {
        return new \PHPUnit_Extensions_Database_Operation_Composite(array(
            new \PHPUnit_Extensions_Database_Operation_Delete(),
            new \PHPUnit_Extensions_Database_Operation_Insert(),
        ));
    }

    public function getDataSet()
    {
        return new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(PHPUNIT_FILES . '/sample.yaml');
    }

    public function test()
    {
        $this->assertTrue(true);
    }
}
