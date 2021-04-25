<?php

use Codeception\Test\Unit;

class phonesModelTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected UnitTester $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function test_add()
    {
        $rows = 100;
        $columns = ['phone', 'sex', 'age', 'region'];
        $values = [];
        for ($i = 0; $i < $rows; $i++) {
            $values[] = [rand(70000000000, 79999999999), rand(0, 2), rand(14, 130),
                 substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10)
            ];
        }

        $num = (new Model_Phones())->add($columns, $values);

        $this->assertEquals($rows, $num);
    }

    public function test_get()
    {
        $phones = (new Model_Phones())->get(new DTO_Phonefilter(['phoneLike' => 10]));
        $this->assertIsArray($phones);

        $phones = (new Model_Phones())->get(new DTO_Phonefilter(['sex' => 1]));
        $this->assertLessThanOrEqual(100, count($phones));
    }
}
