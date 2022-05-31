<?php

namespace App\Tests;

use App\Controller\DefaultController;
use Codeception\Util\HttpCode;

class DefaultControllerCest
{

    public function testIndexForDivideByZero(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('#calculator_operandA', 5);
        $I->fillField('#calculator_operandB', 0);
        $I->click('#calculator_divide');
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function testIndexForAddition(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('#calculator_operandA', 5);
        $I->fillField('#calculator_operandB', 0);
        $I->click('#calculator_add');
        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function testIndexForMultiplication(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('#calculator_operandA', 5);
        $I->fillField('#calculator_operandB', 0);
        $I->click('#calculator_multiply');
        $I->seeResponseCodeIs(HttpCode::OK);
    }

    public function testDivideForStringValueOfOperandA(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('#calculator_operandA', 'asas');
        $I->fillField('#calculator_operandB', 0);
        $I->click('#calculator_divide');
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }

    public function testDivideForStringValueOfOperandB(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('#calculator_operandA', 33);
        $I->fillField('#calculator_operandB', 'sss');
        $I->click('#calculator_divide');
        $I->seeResponseCodeIs(HttpCode::BAD_REQUEST);
    }
}
