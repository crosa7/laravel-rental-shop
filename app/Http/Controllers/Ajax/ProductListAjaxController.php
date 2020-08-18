<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Season;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductListAjaxController extends Controller
{
    private const JUNE = '06';
    private const AUGUST = '08';
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByDates(Request $request): JsonResponse
    {
        $startDate = date('m', strtotime($request->query('start')));

        $seasonKey = 'low';
        if ($startDate >= self::JUNE && $startDate <= self::AUGUST) {
            $seasonKey = 'high';
        }

        $season = Season::where('key', '=', $seasonKey)->first();

        $products = DB::table('products')
            ->leftJoin('price_products', 'products.id', '=', 'price_products.product_id')
            ->where('season_id', '=', $season['id'])
            ->where('number_of_days', '=', '1')
            ->get();

        return new JsonResponse($products);
    }
}
