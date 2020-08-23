<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Factories\ProductFactory;
use App\Http\Repositories\Product\Models\ProductFilterModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductListAjaxController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByDates(Request $request): JsonResponse
    {
        /** @var \App\Http\Repositories\Product\ProductRepository $productsRepository */
        $productsRepository = $this
            ->getFactory(ProductFactory::class)
            ->getProductsRepository();

        return new JsonResponse(
            $productsRepository->getProductsByDate(
                new ProductFilterModel(
                    $request->query('start'),
                    $request->query('end'))
            )
        );
    }
}
