<?php

namespace App\Tests;

use App\Manager\CalculatorManager;

class CalculatorManagerTest extends \Codeception\Test\Unit
{
    private CalculatorManager $calculatorManager;
    protected function _setUp()
    {
        $this->calculatorManager = new CalculatorManager();
    }

    public function testAddTwoNumbers()
    {
        $result = $this->calculatorManager->calculate('add', 5, 2);
        $this->assertEquals(7, $result, 'The result should be 7.');
    }

    public function testSubtractNumbers()
    {
        $result = $this->calculatorManager->calculate('subtract', 5, 2);
        $this->assertEquals(3, $result, 'The result should be 3.');
    }

    public function testMultiplyTwoNumbers()
    {
        $result = $this->calculatorManager->calculate('multiply', 5, 2);
        $this->assertEquals(10, $result, 'The result should be 10.');
    }

    public function testDivideTwoNumbers()
    {
        $result = $this->calculatorManager->calculate('divide', 10, 2);
        $this->assertEquals(5, $result, 'The result should be 5.');
    }

}
