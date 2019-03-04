<?php

namespace App\Wines\Normalizers;

interface WineNormalizerInterface
{
    public function normalize(array $wines): array;
}