<?php

namespace App\Wines\Commands;

use App\Wines\Repositories\WineRepositoryInterface;

class CreateWinesCommand
{
    /**
     * @var array
     */
    private $wines;

    public function __construct(array $wines)
    {
        $this->wines = $wines;
    }

    public function handle(WineRepositoryInterface $wineRepository)
    {
        $wineRepository->clear();

        foreach($this->wines as $wine){
            $wineRepository->store($wine);
        }
    }
}