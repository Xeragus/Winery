<?php

namespace App\Wines;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model implements WineInterface
{
    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    public function setTitle(string $title)
    {
        $this->setAttribute('title', $title);
    }

    public function getLink(): string
    {
        return $this->getAttribute('link');
    }

    public function setLink(string $link)
    {
        $this->setAttribute('link', $link);
    }

    public function getAvailableOn(): string
    {
        return $this->getAttribute('available_on');
    }

    public function setAvailableOn(string $availableOn)
    {
        $this->setAttribute('available_on', $availableOn);
    }

    public function isAvailable(): bool
    {
        return $this->getAvailableOn() == Carbon::now()->format('Y-m-d');
    }

    public function getPrice(): int
    {
        return $this->getAttribute('price');
    }

    public function setPrice(int $price)
    {
        $this->setAttribute('price', $price);
    }

    public function getYear(): int
    {
        return $this->getAttribute('year');
    }

    public function setYear(int $year)
    {
        $this->setAttribute('year', $year);
    }

    public function getCreatedAt()
    {
        return $this->getAttribute('created_at');
    }
}