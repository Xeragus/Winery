<?php

namespace App\Core\ResultLists\Pagination;

interface PaginatableResultsInterface
{
    public function setOffset(int $offset);

    /**
     * @return int|null
     */
    public function getOffset();

    public function setItemsPerPage(int $items);

    public function resetItemsPerPage();

    /**
     * @return int|null
     */
    public function getItemsPerPage();

    public function countTotal(): int;

    public function getResults(): array;
}
