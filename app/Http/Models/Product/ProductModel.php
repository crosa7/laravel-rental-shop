<?php


namespace App\Http\Models\Product;


use App\Http\Models\BaseModel;

class ProductModel extends BaseModel
{
    private const ID = 'id';
    private const NAME = 'name';
    private const DESCRIPTION = 'description';
    private const PRICE = 'price';
    private const QUANTITY = 'quantity';

    protected $propertyNames = [
        self::NAME,
        self::DESCRIPTION,
        self::PRICE,
        self::QUANTITY,
        self::ID,
    ];

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var int
     */
    protected $id;

    public function __construct(
        string $name = null,
        string $description = null,
        float $price = null,
        int $quantity = null,
        int $id = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return \App\Http\Models\Product\ProductModel
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return \App\Http\Models\Product\ProductModel
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return \App\Http\Models\Product\ProductModel
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return \App\Http\Models\Product\ProductModel
     */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return \App\Http\Models\Product\ProductModel
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
