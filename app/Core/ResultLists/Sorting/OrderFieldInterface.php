<?php

declare(strict_types=1);

namespace App\Core\ResultLists\Sorting;

interface OrderFieldInterface
{
    public function getDirection(): string;

    public function getField(): string;

    public function ensureDirectionIsValid(string $direction);
}
