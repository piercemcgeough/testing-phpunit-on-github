<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandExcpetion;

class Division extends OperationAbstract implements OperationInterface
{
    /**
     * @throws NoOperandExcpetion
     */
    public function calculate(): int
    {
        if (count($this->operands) === 0) {
            throw new NoOperandExcpetion();
        }

        return array_reduce(
            array_filter($this->operands),
            function($carry, $item) {
                if ($carry !== null && $item !== null) {
                    return $carry / $item;
                }

                return $item;
            }
        );
    }
}