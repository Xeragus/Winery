<?php

namespace App\Http\Controllers;

use App\Wines\Repositories\WineRepositoryInterface;

class AdminDashboardController extends Controller
{
    public function dashboard(WineRepositoryInterface $wineRepository)
    {
        $lastlySyncedWine = $wineRepository->getLastlySyncedWine();

        return view('admin.dashboard', ['lastSync' => $lastlySyncedWine->created_at]);
    }
}