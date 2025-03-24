<?php

declare(strict_types=1);


namespace Tests\Api;

use Tests\Support\ApiTester;

final class PostAllProductsListCest
{
    public function postAllProductsList(ApiTester $I): void
    {
        $I->sendPost('/productsList', []);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['responseCode' => 405, 'message' => 'This request method is not supported.']);
    }
}
