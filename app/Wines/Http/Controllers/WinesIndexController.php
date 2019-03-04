<?php

namespace App\Http\Controllers;

use App\Wines\Repositories\WineRepositoryInterface;
use App\Wines\Wine;

class WinesIndexController extends Controller
{
    /**
     * @var WineRepositoryInterface
     */
    private $wineRepository;

    public function __construct(WineRepositoryInterface $wineRepository)
    {
        $this->wineRepository = $wineRepository;
    }

    public function index()
    {
        return view('wines.index');
    }

}