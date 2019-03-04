<?php

namespace App\Wines\Providers;

use App\Wines\Normalizers\RSSFeedNormalizer;
use App\Wines\Normalizers\RSSFeedNormalizerInterface;
use App\Wines\Normalizers\WineNormalizer;
use App\Wines\Normalizers\WineNormalizerInterface;
use Illuminate\Support\ServiceProvider;

class NormalizerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            WineNormalizerInterface::class,
            WineNormalizer::class
        );

        $this->app->bind(
            RSSFeedNormalizerInterface::class,
            RSSFeedNormalizer::class
        );
    }
}