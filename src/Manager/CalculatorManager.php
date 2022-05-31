<?php

/*
 * This file is a part of the simple emoji calculator for symfony learning app.
 *
 * Copyright (c) 2022-2023, AHAD NOOR ALAM <https://www.linkedin.com/in/ahadnoor/>
 */

namespace App\Manager;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CalculatorManager
{
    public function calculate(string $operator, float $operandA, float $operandB)
    {
        switch (true) {
            case $operator == 'divide' && 0 == $operandB:
                throw new BadRequestHttpException('Divide by 0 is not possible');
            case $operator == 'add':
                return $operandA + $operandB;
            case $operator == 'subtract':
                return $operandA - $operandB;
            case $operator == 'divide':
                return $operandA / $operandB;
            case $operator == 'multiply':
                return $operandA * $operandB;
        }
        throw new BadRequestHttpException('Unexpected error!');
    }
}
