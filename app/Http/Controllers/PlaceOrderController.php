<?php

namespace App\Http\Controllers;

use App\Http\Factories\CartFactory;
use App\Mail\CustomerOrder;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PlaceOrderController extends Controller
{
    /**
     * @return \Illuminate\View\View
     *
     */
    public function index(): View
    {
        Mail::to('test@example.cc')->send(new CustomerOrder());

        return view('checkout');
    }
}
