<?php

namespace App\Core\ResultLists\Sorting;

interface SortableResultsInterface
{
    public function orderBy(array $fields);

    public function getOrderFields(): array;
}