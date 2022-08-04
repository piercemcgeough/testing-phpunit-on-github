<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandExcpetion;

class Subtraction extends OperationAbstract implements OperationInterface
{
    /**
     * @throws NoOperandExcpetion
     */
    public function calculate(): int
    {
        if (count($this->operands) === 0) {
            throw new NoOperandExcpetion();
        }

        $result = array_shift($this->operands);

        foreach ($this->operands as $operand) {
            $result = $result - $operand;
        }

        return $result;
    }
}