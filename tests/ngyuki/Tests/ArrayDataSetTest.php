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

class ArrayDataSet extends \PHPUnit_Extensions_Database_DataSet_AbstractDataSet
{
    /**
     * @var array
     */
    protected $tables = array();

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $tableName => $rows)
        {
            $columns = array();

            if (isset($rows[0]))
            {
                $columns = array_keys($rows[0]);
            }

            $metaData = new \PHPUnit_Extensions_Database_DataSet_DefaultTableMetaData($tableName, $columns);
            $table = new \PHPUnit_Extensions_Database_DataSet_DefaultTable($metaData);

            foreach ($rows as $row)
            {
                $table->addRow($row);
            }

            $this->tables[$tableName] = $table;
        }
    }

    protected function createIterator($reverse = false)
    {
        return new \PHPUnit_Extensions_Database_DataSet_DefaultTableIterator($this->tables, $reverse);
    }

    public function getTable($tableName)
    {
        if (!isset($this->tables[$tableName]))
        {
            throw new \InvalidArgumentException("$tableName is not a table in the current database.");
        }

        return $this->tables[$tableName];
    }
}