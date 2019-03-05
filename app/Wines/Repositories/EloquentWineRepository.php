<?php

namespace App\Wines\Repositories;

use App\Wines\Wine;
use App\Wines\WineInterface;
use Illuminate\Support\Facades\DB;

class EloquentWineRepository implements WineRepositoryInterface
{
    public function all(): array
    {
        return Wine::get()->all() ?? [];
    }

    public function get(int $id): WineInterface
    {
        return Wine::find($id);
    }

    public function orderBy(string $field, string $direction = 'ASC'): array
    {
        return DB::table('wines')->orderBy($field, $direction)->paginate(7)->items();
    }

    public function getLastlySyncedWineDatetime(): string
    {
        return $this->orderBy('created_at', 'DESC')[0]->created_at;
    }

    public function store(WineInterface $wine)
    {
        return $wine->save();
    }

    public function clear()
    {
        return Wine::truncate();
    }
}