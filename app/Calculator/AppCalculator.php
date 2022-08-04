<?php

namespace App\Calculator;

use function PHPUnit\Framework\isInstanceOf;

class AppCalculator
{
    protected array $operations = [];

    public function setOperation(OperationInterface $operation): void
    {
        $this->operations[] = $operation;
    }

    public function setOperations(array $operations): void
    {
        $filteredOperations = array_filter($operations, function ($operation) {
            return $operation instanceof OperationInterface;
        });

        $this->operations = array_merge($this->operations, $filteredOperations);
    }

    public function getOperations(): array
    {
        return $this->operations;
    }

    public function calculate(): array|int
    {
        if (count($this->operations) === 1) {
            return $this->operations[0]->calculate();
        }

        return array_map(function ($operation) {
            /** @var OperationInterface $operation */
            return $operation->calculate();
        }, $this->operations);
    }
}