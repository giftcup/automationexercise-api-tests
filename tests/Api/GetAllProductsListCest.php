<?php

declare(strict_types=1);


namespace Tests\Api;

use Tests\Support\ApiTester;

final class GetAllProductsListCest
{
    public function getAllProductsList(ApiTester $I): void {
        $response = $I->sendGet('/productsList');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}


