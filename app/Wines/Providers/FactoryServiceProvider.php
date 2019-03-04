<?php

namespace App\Wines\Providers;

use App\Wines\Factories\WineOrderFactory;
use App\Wines\Factories\WineOrderFactoryInterface;
use App\Wines\Factories\WinesFactory;
use App\Wines\Factories\WinesFactoryInterface;
use Illuminate\Support\ServiceProvider;

class FactoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            WinesFactoryInterface::class,
            WinesFactory::class
        );

        $this->app->bind(
            WineOrderFactoryInterface::class,
            WineOrderFactory::class
        );
    }
}