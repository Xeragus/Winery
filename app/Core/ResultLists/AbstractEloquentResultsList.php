<?php

namespace App\Core\ResultLists;

use Illuminate\Database\Eloquent\Builder as Query;
use App\Core\ResultLists\Pagination\PaginatableResultsInterface;
use App\Core\ResultLists\Sorting\OrderField;
use App\Core\ResultLists\Sorting\SortableResultsInterface;

abstract class AbstractEloquentResultsList implements PaginatableResultsInterface, SortableResultsInterface
{
    private $offset;
    private $perPage;
    private $orderByFields = [];
    private $countTotalCache = null;

    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return int|null
     */
    public function getOffset()
    {
        return $this->offset;
    }

    public function setItemsPerPage(int $items)
    {
        $this->perPage = $items;
    }

    public function resetItemsPerPage()
    {
        $this->perPage = null;
    }

    /**
     * @return int|null
     */
    public function getItemsPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param OrderField[] $fields
     */
    public function orderBy(array $fields)
    {
        $this->orderByFields = $fields;
    }

    /**
     * @return OrderField[]
     */
    public function getOrderFields(): array
    {
        return $this->orderByFields;
    }

    public function countTotal(): int
    {
        if ($this->countTotalCache) {
            return $this->countTotalCache;
        }

        $query = $this->prepareQuery();

        $results = $query->getQuery()
            ->getConnection()
            ->select(
                'select count(*) as AGGREGATE from (' . $query->toSql() . ') as `count`',
                $query->getBindings()
            );

        $this->countTotalCache = (int) (isset($results[0]) ? ($results[0]->AGGREGATE ?? 0) : 0);

        return $this->countTotalCache;
    }

    public function getResults($avoidSerialization = false): array
    {
        $query = $this->prepareQuery();

        foreach ($this->getOrderFields() as $order) {
            $query->orderBy($order->getField(), $order->getDirection());
        }

        if ($this->getOffset()) {
            $query->skip($this->getOffset());
        }

        if ($this->getItemsPerPage()) {
            $query->take($this->getItemsPerPage());
        }

        if ($avoidSerialization) {
            return $query->get()->toArray();
        }

        return $query->get()->all();
    }

    abstract protected function prepareQuery(): Query;
}
