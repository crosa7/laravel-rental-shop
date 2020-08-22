<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Factories\ProductFactory;
use App\Http\Repositories\ProductRepository\Models\ProductFilterModel;
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
        $startDate = date('m', strtotime($request->query('start')));

        /** @var \App\Http\Repositories\ProductRepository\ProductsRepository $productsRepository */
        $productsRepository = $this
            ->getFactory(ProductFactory::class)
            ->getProductsRepository();

        return new JsonResponse($productsRepository->getProductsByDate(new ProductFilterModel($startDate)));
    }
}
