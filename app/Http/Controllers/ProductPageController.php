<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\View\View;

class ProductPageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
//        $products = Product::all();

        $products =
            [
                [
                    'name' => 'Ageece Alfa',
                    'description' => 'Bike with 27 gears and hydraulic suspension',
                    'price' => '20.50',
                ],
                [
                    'name' => 'Coluer Mega',
                    'description' => 'Bike with 12 gears',
                    'price' => '30',
                ],
            ];

        return view('list')->with('products', json_encode($products));
    }
}
