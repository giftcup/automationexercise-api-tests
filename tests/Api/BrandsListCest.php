<?php

declare(strict_types=1);


namespace Tests\Api;

use Tests\Support\ApiTester;

final class BrandsListCest
{
    public function getAllBrandsList(ApiTester $I): void
    {
       $I->sendGet('/brandsList');
       $I->seeResponseIsJson();
       $I->seeResponseContainsJson([
        'brands' => [
            'id' => 1,
            'brand' => 'Polo'
        ]
        ]);
    }

    public function putToAllBrandsList(ApiTester $I): void
    {
        $I->sendPut('/brandsList', []);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'responseCode' => 405,
            'message' => 'This request method is not supported.'
        ]);
    }
}
