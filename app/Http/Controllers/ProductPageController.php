<?php

namespace App\Http\Controllers;

use App\Http\Factories\CartFactory;
use Illuminate\View\View;

class ProductPageController extends Controller
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

        return view('list')->with('cart', $cartSessionRepository->get() ?? '{}' );
    }
}
