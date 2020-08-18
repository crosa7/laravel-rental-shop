<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductPageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('list');
    }
}
