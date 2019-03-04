<?php

namespace App\Wines\WinesList;

use App\Core\ResultLists\AbstractEloquentResultsList;
use App\Wines\Wine;
use Illuminate\Database\Eloquent\Builder as Query;
use Illuminate\Support\Facades\DB;

class EloquentWineList extends AbstractEloquentResultsList implements WineListInterface
{
    protected function prepareQuery(): Query
    {
        $qb = Wine::query();
        $qb->select(DB::raw('wines.*'));

        return $qb;
    }
}