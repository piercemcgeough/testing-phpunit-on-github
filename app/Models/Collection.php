<?php

namespace App\Models;

use ArrayIterator;

class Collection implements \IteratorAggregate, \JsonSerializable
{
    private array $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    #[\ReturnTypeWillChange]
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function get(): array
    {
        return $this->items;
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function merge(Collection $collection)
    {
        $this->add($collection->get());
    }

    public function add(array $items)
    {
        $this->items = [...$this->items, ...$items];
    }

    public function toJson(): string
    {
        return json_encode($this->items);
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->items;
    }
}