<?php

namespace App\Wines\Normalizers;

interface RSSFeedNormalizerInterface
{
    public function normalize($rssFeedWineItem): array;
}