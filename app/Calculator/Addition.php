<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandExcpetion;

class Addition extends OperationAbstract implements OperationInterface
{
    /**
     * @throws NoOperandExcpetion
     */
    public function calculate(): int
    {
        if (count($this->operands) === 0) {
            throw new NoOperandExcpetion();
        }

        return array_sum($this->operands);
    }
}