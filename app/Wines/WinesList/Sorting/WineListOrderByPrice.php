<?php

namespace App\Wines\WinesList\Sorting;

use App\Core\ResultLists\Sorting\OrderDirection;
use App\Core\ResultLists\Sorting\OrderField;
use App\Core\ResultLists\Sorting\OrderFieldInterface;

class WineListOrderByPrice extends OrderField implements OrderFieldInterface
{
    protected $field = 'wines.price';
    protected $direction;

    public function __construct(string $direction = OrderDirection::DESC)
    {
        $this->ensureDirectionIsValid($direction);

        $this->direction = $direction;
    }
}
