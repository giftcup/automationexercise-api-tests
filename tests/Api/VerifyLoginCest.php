<?php

declare(strict_types=1);


namespace Tests\Api;

use Tests\Support\ApiTester;

final class VerifyLoginCest
{
    /**
     * @group verifyLogin
     */
    public function VerifyLoginWithValidCredentials(ApiTester $I): void
    {
        $expectedResults = [
            "responseCode" => 200,
            "message" => "User exists!"
        ];

        $requestParameters = [
            "email" => "tester@mail.com",
            "password" => "tester123"
        ];

        $I->sendPost('/verifyLogin', $requestParameters);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($expectedResults);
    }

    /**
     * @group verifyLogin
     */
    public function VerifyLoginWithoutEmail(ApiTester $I): void
    {
        $expectedResults = [
            "responseCode" => 400,
            "message" => "Bad request, email or password parameter is missing in POST request."
        ];

        $requestParameters = [
            "password" => "tester123"
        ];

        $I->sendPost('/verifyLogin', $requestParameters);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($expectedResults);
    }

    /**
     * @group verifyLogin
     */
    public function DeleteToVerifyLogin(ApiTester $I): void
    {
        $expectedResults = [
            "responseCode" => 405,
            "message" => "This request method is not supported."
        ];

        $I->sendDelete('/verifyLogin');
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($expectedResults);
    }

    /**
     * @group verifyLogin
     */
    public function VerifyLoginWithInvalidCredentials(ApiTester $I): void
    {
        $expectedResults = [
            "responseCode" => 404,
            "message" => "User not found!"
        ];

        $requestParameters = [
            "email" => "tester0@mail.com",
            "password" => "tester124"
        ];

        $I->sendPost('/verifyLogin', $requestParameters);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($expectedResults);
    }
}
