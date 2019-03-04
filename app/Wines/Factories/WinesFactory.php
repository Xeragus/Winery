<?php

namespace App\Wines\Factories;

use App\Wines\Normalizers\RSSFeedNormalizerInterface;
use App\Wines\Wine;
use App\Wines\WineInterface;

class WinesFactory implements WinesFactoryInterface
{
    private $rssFeedNormalizer;

    public function __construct(RSSFeedNormalizerInterface $rssFeedNormalizer)
    {
        $this->rssFeedNormalizer = $rssFeedNormalizer;
    }

    public function buildWines(): array
    {
        $feed = \Feeds::make('https://www.winespectator.com/rss/rss?t=dwp');
        $items = $feed->get_items();
        $wines = [];

        foreach($items as $item)
        {
            $wines[] = $this->buildWine($item);
        }

        return $wines;
    }

    private function buildWine($item): WineInterface
    {
        $wine = new Wine();

        $normalizedRSSFeedWineItem = $this->rssFeedNormalizer->normalize($item);

        $wine->setTitle($normalizedRSSFeedWineItem['title']);
        $wine->setYear($normalizedRSSFeedWineItem['year']);
        $wine->setPrice($normalizedRSSFeedWineItem['price']);
        $wine->setLink($normalizedRSSFeedWineItem['link']);
        $wine->setAvailableOn($normalizedRSSFeedWineItem['available_on']);

        return $wine;
    }
}