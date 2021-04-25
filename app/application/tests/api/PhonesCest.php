<?php

use Codeception\Util\HttpCode;

class PhonesCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function add(ApiTester $I)
    {
        $rows = 100;
        $values = [];
        for ($i = 0; $i < $rows; $i++) {
            $values[] = ['phone' => rand(70000000000, 79999999999), 'sex' => rand(0, 2), 'age' => rand(14, 130),
                 'region' => substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10)
            ];
        }

        $I->sendPost('/phones/add', ['phones' => $values]);
        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"done":1');
        $I->seeResponseContains("rowInserted");
    }

    public function get(ApiTester $I)
    {
        $I->sendPost('/phones/get', ['filters' => ['phoneLike' => 10]]);

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"done":1');
        $I->seeResponseContains('"phones"');

        $I->sendPost('/phones/get', ['filters' => []]);

        $I->seeResponseCodeIs(HttpCode::OK);
        $I->seeResponseIsJson();
        $I->seeResponseContains('"done":1');
        $I->seeResponseContains('"phones"');
    }
}
