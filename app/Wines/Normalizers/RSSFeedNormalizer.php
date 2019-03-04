<?php

namespace App\Wines\Normalizers;

use Carbon\Carbon;

class RSSFeedNormalizer implements RSSFeedNormalizerInterface
{
    public function normalize($rssFeedWineItem): array
    {
        $titleAndYearString = explode(' $', $rssFeedWineItem->get_title())[0];

        $title = implode(' ', array_slice(explode(' ', $titleAndYearString), 0, -1));

        $titleParts = explode(' ', $titleAndYearString);
        $year = $titleParts[count($titleParts) - 1];


        $titleParts = explode(' ', $rssFeedWineItem->get_title());
        $price = (int) str_replace('$', '', $titleParts[count($titleParts) - 3]);

        $availableOn = Carbon::createFromFormat('d M Y, H:i A', $rssFeedWineItem->get_date())->format('Y-m-d');

        return [
            'title' => $title,
            'year' => $year,
            'price' => $price,
            'link' => $rssFeedWineItem->get_link(),
            'available_on' => $availableOn
        ];
    }
}