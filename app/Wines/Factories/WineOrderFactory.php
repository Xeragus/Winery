<?php

namespace App\Wines\Factories;

use App\Core\ResultLists\Sorting\InvalidOrderException;
use App\Core\ResultLists\Sorting\OrderFieldInterface;
use App\Wines\WinesList\Sorting\WineListOrderByPrice;

class WineOrderFactory implements WineOrderFactoryInterface
{
    public function build(string $orderRaw, string $direction): OrderFieldInterface
    {
        switch ($orderRaw) {
            case 'price':
                return new WineListOrderByPrice($direction);
                break;
            default:
                throw new InvalidOrderException($orderRaw);
                break;
        }
    }
}