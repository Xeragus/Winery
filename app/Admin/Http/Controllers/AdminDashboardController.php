<?php

namespace App\Http\Controllers;

use App\Wines\Repositories\WineRepositoryInterface;
use App\Wines\Wine;

class AdminDashboardController extends Controller
{
    public function dashboard(WineRepositoryInterface $wineRepository)
    {
        return view('admin.dashboard', [
            'wines' => Wine::paginate(7)
        ]);
    }
}