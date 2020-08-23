<?php


namespace App\Http\Repositories\Cart;


use App\Http\Models\Cart\CartModel;
use App\Http\Models\Product\ProductModel;
use Illuminate\Support\Facades\Session;

class CartSessionRepository
{
    private const CART_SESSION_KEY = 'cart';

    private const PAY_NOW_PERCENTAGE = 0.4;

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
        $cartModel = $this->getDecodedCart();

        foreach ($cartModel->getProducts() as $product) {
            if ($product->getId() === $productModel->getId()) {
                $product->setQuantity($product->getQuantity() + (int)$productModel->getQuantity());

                $this->set($cartModel);

                return;
            }
        }

        $cartModel->addProduct($productModel);

        $this->calculateTotals($cartModel);
        $this->set($cartModel);
    }

    /**
     * @param \App\Http\Models\Cart\CartModel $cartModel
     */
    private function calculateTotals(CartModel $cartModel): void
    {
        /** @var ProductModel $productModel */
        $totalCartPrice = 0.00;
        foreach ($cartModel->getProducts() as $productModel) {
            $total = (int)$productModel->getQuantity() * $productModel->getPrice();
            $productModel->setTotalPrice($total);

            $totalCartPrice += $total;
        }

        $cartModel->setTotal($this->formatPrice($totalCartPrice));
        $cartModel->setTotalToPay($this->formatPrice($totalCartPrice * self::PAY_NOW_PERCENTAGE));
        $cartModel->setTotalToBePayed($this->formatPrice($totalCartPrice * (1 - self::PAY_NOW_PERCENTAGE)));
    }

    /**
     * @param float $price
     *
     * @return string
     */
    private function formatPrice(float $price)
    {
        return (float)number_format($price, 2, '.', '');
    }

    /**
     * @return \App\Http\Models\BaseModel|\App\Http\Models\Cart\CartModel
     */
    private function getDecodedCart(): CartModel
    {
        $cartInSession = json_decode($this->get(), true);

        $cartModel = (new CartModel())->setProducts([]);
        if ($cartInSession !== null) {
            $cartModel = $cartModel->fromArray($cartInSession);
        }

        return $cartModel;
    }
}
