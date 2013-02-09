<?php
namespace ngyuki\Tests;

class ArrayDataSetTest extends \PHPUnit_Extensions_Database_TestCase
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
        return new ArrayDataSet(array(
            't_group' => array(
                array('group_id' => 1, 'group_name' => 'admins'),
                array('group_id' => 2, 'group_name' => 'users'),
            ),
            't_user' => array(
                array('user_id' => 1, 'group_id' => 1, 'user_name' => 'hogehoge'),
                array('user_id' => 2, 'group_id' => 2, 'user_name' => 'piyopiyo'),
            ),
        ));
    }

    public function test()
    {
        $this->assertTrue(true);
    }
}
