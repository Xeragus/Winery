<?php

declare(strict_types=1);

namespace App\Core\ResultLists\Sorting;

interface OrderFactoryInterface
{
    /**
     * @param string $orderRaw
     * @param string $direction
     */
    public function build(string $orderRaw, string $direction);
}
