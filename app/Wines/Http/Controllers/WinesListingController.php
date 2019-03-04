<?php

namespace App\Http\Controllers;

use App\Core\ResultLists\Sorting\OrderDirection;
use App\Wines\Factories\WineOrderFactoryInterface;
use App\Wines\Normalizers\WineNormalizerInterface;
use App\Wines\WinesList\WineListInterface;
use Illuminate\Http\Request;

class WinesListingController extends Controller
{
    public function listing(
        Request $request,
        WineListInterface $wineList,
        WineOrderFactoryInterface $wineOrderFactory,
        WineNormalizerInterface  $wineNormalizer
    ) {
        $offset = (int) $request->get('start', 0);
        $perPage = (int) $request->get('length', 1000);

        $orderBy = $request->get('order_by', 'price');
        $orderDirection = $request->get('order_direction', OrderDirection::DESC);

        $order = $wineOrderFactory->build($orderBy, $orderDirection);

        $wineList->orderBy([$order]);
        $wineList->setOffset($offset);
        $wineList->setItemsPerPage($perPage);

        return response()->json([
            'error' => false,
            'items' => $wineNormalizer->normalize($wineList->getResults())
        ]);
    }

}