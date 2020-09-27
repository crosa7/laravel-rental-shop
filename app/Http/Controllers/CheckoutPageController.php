<?php

namespace App\Http\Controllers;

use App\Http\Factories\CartFactory;
use Illuminate\View\View;

class CheckoutPageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     *
     */
    public function index(): View
    {
        $cartSessionRepository = $this
            ->getFactory(CartFactory::class)
            ->getCartSessionRepository();

        return view('checkout')->with('cart', $cartSessionRepository->get() ?? '{}' );
    }
}
