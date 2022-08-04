<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandExcpetion;

class Multiplication extends OperationAbstract implements OperationInterface
{
    /**
     * @throws NoOperandExcpetion
     */
    public function calculate(): int
    {
        if (count($this->operands) === 0) {
            throw new NoOperandExcpetion();
        }

        $operands = array_filter($this->operands);

        $result = array_shift($operands);

        foreach ($operands as $operand) {
            $result = $result * $operand;
        }

        return $result;
    }
}