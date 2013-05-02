<?php
namespace ngyuki\Tests;

class YamlDataSetTest extends TestCase
{
    public function getDataSet()
    {
        return new \PHPUnit_Extensions_Database_DataSet_YamlDataSet(PHPUNIT_FILES . '/sample.yaml');
    }

    public function test()
    {
        $this->assertTrue(true);
    }
}
