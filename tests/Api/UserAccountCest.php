<?php

declare(strict_types=1);


namespace Tests\Api;

use Tests\Support\ApiTester;

final class UserAccountCest
{
    public function _before(ApiTester $I): void
    {
        // Code here will be executed before each test.
    }
   
    /**
     * @group UserAccount
     */
    public function RegisterUserAccount(ApiTester $I): void
    {
        $expectedResults = [
            "responseCode" => 201,
            "message" => "User created!"
        ];

        $requestParameters = [
            "name" => "Tester123",
            "email" => "testAva@mail.com",
            "password" => "tester321",
            "title" => "Mr",
            "birth_date" => "13",
            "birth_month" => "January",
            "birth_year" => "2005",
            "firstname" => "Tester",
            "lastname" => "Test",
            "company" => "Dla Com",
            "address1" => "Dla1",
            "address2" => "Dla2",
            "country" => "India",
            "zipcode" => "0000",
            "state" => "Dla",
            "city" => "Dla",
            "mobile_number" => "6491930"
        ];

        $I->sendPost('/createAccount', $requestParameters);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($expectedResults);

    }

    /**
     * @group UserAccount
     */
    public function UpdateUserAccount(ApiTester $I): void
    {
       $expectedResults = [
           "responseCode" => 200,
           "message" => "User updated!"
       ];

       $requestParameters = [
           "name" => "Tester123",
           "email" => "testAva@mail.com",
           "password" => "tester31",
           "title" => "Mr",
           "birth_date" => "13",
           "birth_month" => "January",
           "birth_year" => "2005",
           "firstname" => "Tester",
           "lastname" => "Test",
           "company" => "Dla Com",
           "address1" => "Dla1",
           "address2" => "Dla2",
           "country" => "India",
           "zipcode" => "0000",
           "state" => "Dla",
           "city" => "Dla",
           "mobile_number" => "6491930"
       ];

       $I->sendPut('/updateAccount', $requestParameters);
       $I->seeResponseIsJson();
       $I->seeResponseContainsJson($expectedResults);
    }

    /**
    * @group UserAccount
    */
    public function UserAccountDetailByEmail(ApiTester $I): void
    {
       $expectedResults = [
           "responseCode" => 200,
           "user" => []
       ];

       $requestParameters = [
           "email" => "testAva@mail.com"
       ];

       $I->sendGet('/getUserDetailByEmail', $requestParameters);
       $I->seeResponseIsJson();
       $I->seeResponseContainsJson($expectedResults);
    }

    /**
     * @group UserAccount
     */

     public function DeleteUserAccount(ApiTester $I): void
     {
        $expectedResults = [
            "responseCode" => 200,
            "message" => "Account deleted!"
        ];

        $requestParameters = [
            "email" => "testAva@mail.com",
            "password" => "tester321"
        ];

        $I->sendDelete('/deleteAccount', $requestParameters);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($expectedResults);
     }
}
