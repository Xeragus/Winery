<?php

namespace App\Http\Controllers;

use App\Wines\Commands\CreateWinesCommand;
use App\Wines\Factories\WinesFactoryInterface;
use Illuminate\Contracts\Bus\Dispatcher;

class AdminWinesSyncController extends Controller
{
    public function sync(WinesFactoryInterface $winesFactory, Dispatcher $commandBus)
    {
        $error = false;
        $items = [];

        try {
            $wines = $winesFactory->buildWines();

            $commandBus->dispatch(new CreateWinesCommand($wines));

            $message = 'Wines updated successfully';
        } catch (\Exception $e) {
            $error = true;
            $message = $e->getMessage();
        }

        return response()->json([
            'error' => $error,
            'message' => $message,
            'items' => $items
        ]);
    }
}