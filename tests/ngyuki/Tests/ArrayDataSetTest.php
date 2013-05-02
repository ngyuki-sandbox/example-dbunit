<?php
namespace ngyuki\Tests;

class ArrayDataSetTest extends TestCase
{
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
