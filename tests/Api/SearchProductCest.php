<?php

declare(strict_types=1);


namespace Tests\Api;

use Tests\Support\ApiTester;

final class SearchProductCest
{
    public function searchProduct(ApiTester $I): void
    {
        $expectedResults = [
            'products' => [
                "id" => 1,
                "name" => "Blue Top",
                "price" => "Rs. 500",
                "brand" => "Polo",
                "category" => [
                    "usertype" => [
                        "usertype" => "Women"
                    ],
                    "category" => "Tops"
                ]
            ]
        ];

        $I->sendPost('/searchProduct', ['search_product' => 'top']);
        $I->seeResponseIsJson();
        $I->canSeeResponseContainsJson($expectedResults);
    }

    public function searchProductWithoutParameters(ApiTester $I): void
    {
        $expectedResults = [
            'responseCode' => 400,
            'message' => 'Bad request, search_product parameter is missing in POST request.'
        ];

        $I->sendPost('/searchProduct');
        $I->seeResponseIsJson();
        $I->canSeeResponseContainsJson($expectedResults);
    }
}
