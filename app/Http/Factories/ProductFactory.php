<?php


namespace App\Http\Factories;


use App\Http\Repositories\ProductRepository\ProductsRepository;

class ProductFactory
{
    /**
     * @return \App\Http\Repositories\ProductRepository\ProductsRepository
     */
    public function getProductsRepository(): ProductsRepository
    {
        return new ProductsRepository();
    }
}
