<?php

/*
 * This file is a part of the simple emoji calculator for symfony learning app.
 *
 * Copyright (c) 2022-2023, AHAD NOOR ALAM <https://www.linkedin.com/in/ahadnoor/>
 */

namespace App\DataMapper;

class CalculatorDataMapper
{
    private $operandA;

    private $operandB;

    public function getOperandA(): ?float
    {
        return $this->operandA;
    }

    public function setOperandA(string $operandA): self
    {
        $this->operandA = $operandA;

        return $this;
    }

    public function getOperandB(): ?float
    {
        return $this->operandB;
    }

    public function setOperandB(string $operandB): self
    {
        $this->operandB = $operandB;

        return $this;
    }
}
