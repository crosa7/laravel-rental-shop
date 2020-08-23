<?php


namespace App\Http\Repositories\Cart;


use App\Http\Models\Cart\CartModel;
use App\Http\Models\Product\ProductModel;
use Illuminate\Support\Facades\Session;

class CartSessionRepository
{
    private const CART_SESSION_KEY = 'cart';

    /**
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed|null
     */
    public function get(): ?string
    {
        return Session::get(self::CART_SESSION_KEY);
    }

    /**
     * @param \App\Http\Models\Cart\CartModel $cartModel
     *
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function set(CartModel $cartModel): void
    {
        Session::put(self::CART_SESSION_KEY, json_encode($cartModel->toArray()));
    }

    /**
     * @param \App\Http\Models\Product\ProductModel $productModel
     *
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    public function addProduct(ProductModel $productModel): void
    {
        $cartInSession = json_decode($this->get(), true);

        $cartModel = (new CartModel())->setProducts([]);
        if ($cartInSession !== null) {
            $cartModel = $cartModel->fromArray($cartInSession);
        }

        foreach ($cartModel->getProducts() as $product) {
            if ($product->getId() === $productModel->getId()) {
                $product->setQuantity($product->getQuantity() + 1);

                Session::put(self::CART_SESSION_KEY, json_encode($cartModel->toArray()));

                return;
            }
        }

        $cartModel->addProduct($productModel->setQuantity(1));

        Session::put(self::CART_SESSION_KEY, json_encode($cartModel->toArray()));
    }
}
