<?php

namespace App\Wines\Repositories;

use App\Wines\WineInterface;

interface WineRepositoryInterface
{
    public function all(): array;

    public function get(int $id): WineInterface;

    public function orderBy(string $field, string $direction = 'ASC'): array;

    public function getLastlySyncedWine();

    public function store(WineInterface $wine);

    public function clear();
}