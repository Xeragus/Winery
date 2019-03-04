<?php

namespace App\Wines\Providers;

use App\Wines\Repositories\EloquentWineRepository;
use App\Wines\Repositories\WineRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            WineRepositoryInterface::class,
            EloquentWineRepository::class
        );
    }
}