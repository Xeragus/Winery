<?php

namespace App\Wines\Factories;

interface WineOrderFactoryInterface
{
    public function build(string $orderRaw, string $direction);
}