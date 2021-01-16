<?php


namespace App\Http\Controllers\Ajax;


use App\Http\Controllers\Controller;
use App\Http\Factories\CartFactory;
use App\Http\Models\Product\ProductModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartAjaxController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function addProduct(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $productModel = (new ProductModel())->fromArray($data);

        /** @var \App\Http\Repositories\Cart\CartSessionRepository $cartSessionRepository */
        $cartSessionRepository = $this
            ->getFactory(CartFactory::class)
            ->getCartSessionRepository();

        $cartSessionRepository->addProduct($productModel);

        return new JsonResponse(json_decode($cartSessionRepository->get()));
    }
}
