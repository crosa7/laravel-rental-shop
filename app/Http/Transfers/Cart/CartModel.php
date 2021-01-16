<?php


namespace App\Http\Transfers\Cart;


use App\Http\Transfers\BaseModel;
use App\Http\Transfers\Product\ProductModel;

class CartModel extends BaseModel
{
    private const PRODUCTS = 'products';
    private const TOTAL = 'total';
    private const TOTAL_TO_PAY = 'totalToPay';
    private const TOTAL_TO_BE_PAYED = 'totalToBePayed';

    protected $propertyNames = [
        self::PRODUCTS,
        self::TOTAL,
        self::TOTAL_TO_PAY,
        self::TOTAL_TO_BE_PAYED,
    ];

    /**
     * @var array
     */
    protected $products;

    /**
     * @var float
     */
    protected $total;

    /**
     * @var float
     */
    protected $totalToPay;

    /**
     * @var float
     */
    protected $totalToBePayed;

    public function __construct(
        array $products = null,
        float $total = null,
        float $totalToPay = null,
        float $totalToBePayed = null
    ) {

        $this->products = $products;
        $this->total = $total;
        $this->totalToPay = $totalToPay;
        $this->totalToBePayed = $totalToBePayed;
    }

    /**
     * @return array
     */
    public function getPropertyNames(): array
    {
        return $this->propertyNames;
    }

    /**
     * @param array $propertyNames
     */
    public function setPropertyNames(array $propertyNames): void
    {
        $this->propertyNames = $propertyNames;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     *
     * @return \App\Http\Transfers\Cart\CartModel
     */
    public function setProducts(array $products): self
    {
        $this->products = $products;

        return $this;
    }

    /**
     * @param \App\Http\Transfers\Product\ProductModel $productModel
     *
     * @return \App\Http\Transfers\Cart\CartModel
     */
    public function addProduct(ProductModel $productModel): self
    {
        $this->products[] = $productModel;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @param float $total
     */
    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    /**
     * @return float
     */
    public function getTotalToPay(): float
    {
        return $this->totalToPay;
    }

    /**
     * @param float $totalToPay
     */
    public function setTotalToPay(float $totalToPay): void
    {
        $this->totalToPay = $totalToPay;
    }

    /**
     * @return float
     */
    public function getTotalToBePayed(): float
    {
        return $this->totalToBePayed;
    }

    /**
     * @param float $totalToBePayed
     */
    public function setTotalToBePayed(float $totalToBePayed): void
    {
        $this->totalToBePayed = $totalToBePayed;
    }

//    private function calculateTotal()
//    {
//        $totalPrice = 0.00;
//        foreach ($this->products as $product) {
//            $totalPrice += $product->getPrice() * $product->getQuantity();
//        }
//    }
}
