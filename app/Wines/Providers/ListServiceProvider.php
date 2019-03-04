<?php

namespace App\Wines\Providers;

use App\Wines\WinesList\EloquentWineList;
use App\Wines\WinesList\WineListInterface;
use Illuminate\Support\ServiceProvider;

class ListServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            WineListInterface::class,
            EloquentWineList::class
        );
    }
}