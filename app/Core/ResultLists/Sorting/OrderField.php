<?php

namespace App\Core\ResultLists\Sorting;

abstract class OrderField
{
    public function ensureDirectionIsValid(string $direction)
    {
        if (!in_array(strtoupper($direction), [OrderDirection::DESC, OrderDirection::ASC])) {
            throw new InvalidOrderDirectionException($direction);
        }
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function getField(): string
    {
        return $this->field;
    }
}
