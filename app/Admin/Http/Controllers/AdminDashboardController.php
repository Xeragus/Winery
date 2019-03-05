<?php

namespace App\Http\Controllers;

use App\Wines\Repositories\WineRepositoryInterface;

class AdminDashboardController extends Controller
{
    public function dashboard(WineRepositoryInterface $wineRepository)
    {
        return view('admin.dashboard', [
            'lastSync' =>  $wineRepository->getLastlySyncedWineDatetime()
        ]);
    }
}