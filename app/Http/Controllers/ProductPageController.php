<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductPageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $products = DB::table('products')
            ->leftJoin('price_products', 'products.id', '=', 'price_products.product_id')
            ->where('season_id', '=', '1')
            ->where('number_of_days', '=', '1')
            ->get();

//        $products =
//            [
//                [
//                    'name' => 'Ageece Alfa',
//                    'description' => 'Bike with 27 gears and hydraulic suspension',
//                    'price' => '20.50',
//                ],
//                [
//                    'name' => 'Coluer Mega',
//                    'description' => 'Bike with 12 gears',
//                    'price' => '30',
//                ],
//            ];

        return view('list')->with('products', json_encode($products));
    }
}
