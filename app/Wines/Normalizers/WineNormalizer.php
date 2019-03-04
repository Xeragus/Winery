<?php

namespace App\Wines\Normalizers;


use App\Wines\WineInterface;
use Carbon\Carbon;

class WineNormalizer implements WineNormalizerInterface
{
    public function normalize(array $wines): array
    {
        $normalizedWines = [];

        if (is_array($wines)) {
            foreach($wines as $wine) {
                $normalizedWines[] = $this->doNormalize($wine);
            }
        } else {
            $normalizedWines[] = $this->doNormalize($wines);
        }

        return $normalizedWines;
    }

    private function doNormalize(WineInterface $wine): array
    {
        return [
            'title' => $wine->getTitle(),
            'price' => $wine->getPrice(),
            'link' => $wine->getLink(),
            'available_on' => $wine->getAvailableOn(),
            'is_available' => $wine->getAvailableOn() == Carbon::now()->format('Y-m-d'),
            'year' => $wine->getYear()
        ];
    }
}