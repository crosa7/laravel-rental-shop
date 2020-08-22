<?php


namespace App\Http\Factories;


use App\Http\Repositories\Cart\CartSessionRepository;

class CartFactory
{
    /**
     * @return \App\Http\Repositories\Cart\CartSessionRepository
     */
    public function getCartSessionRepository(): CartSessionRepository
    {
        return new CartSessionRepository();
    }
}
