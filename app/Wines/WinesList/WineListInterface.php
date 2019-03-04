<?php

namespace App\Wines\WinesList;

use App\Core\ResultLists\Pagination\PaginatableResultsInterface;
use App\Core\ResultLists\Sorting\SortableResultsInterface;

interface WineListInterface extends PaginatableResultsInterface, SortableResultsInterface
{

}