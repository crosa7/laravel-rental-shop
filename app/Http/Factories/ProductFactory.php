<?php


namespace App\Http\Factories;


use App\Http\Repositories\Product\ProductRepository;

class ProductFactory
{
    /**
     * @return \App\Http\Repositories\Product\ProductRepository
     */
    public function getProductsRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
