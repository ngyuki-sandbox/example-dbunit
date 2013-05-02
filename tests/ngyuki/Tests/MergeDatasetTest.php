<?php
namespace ngyuki\Tests;

class MergeDatasetTest extends TestCase
{
    public function mergeDataSet($dataset1, $dataset2)
    {
        $list = func_get_args();

        $dataset = new \PHPUnit_Extensions_Database_DataSet_DefaultDataSet();

        /* @var $ds \PHPUnit_Extensions_Database_DataSet_IDataSet */
        foreach ($list as $ds)
        {
            /* @var $table \PHPUnit_Extensions_Database_DataSet_ITable */
            foreach ($ds as $table)
            {
                $dataset->addTable($table);
            }
        }

        return $dataset;
    }

    public function getDataSet()
    {
        return $this->mergeDataSet(
            new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(PHPUNIT_FILES . '/sample.yaml'),
            new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(PHPUNIT_FILES . '/merge.yaml')
        );
    }

    public function test()
    {
        $this->assertTrue(true);
    }
}

