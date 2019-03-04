<?php

namespace App\Core\ResultLists\Sorting;

class InvalidOrderException extends \Exception
{
    private $order;

    public function __construct(string $order)
    {
        $this->order = $order;

        parent::__construct(sprintf(
            '%s is not a valid order.',
            $order
        ));
    }
}
