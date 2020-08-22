<?php


namespace App\Http\Models\Product;


class ProductModel
{
    private const NAME = 'name';
    private const DESCRIPTION = 'description';
    private const PRICE = 'price';

    private $propertyNames = [
        self::NAME,
        self::DESCRIPTION,
        self::PRICE,
    ];

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $price;

    public function __construct(
        string $name = null,
        string $description = null,
        float $price = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param array $data
     *
     * @return \App\Http\Models\Product\ProductModel
     */
    public function fromArray(array $data): self
    {
        foreach ($data as $fieldName => $value) {
            switch ($fieldName) {
                case self::NAME:
                    $this->setName($value);
                    break;
                case self::DESCRIPTION:
                    $this->setDescription($value);
                    break;
                case self::PRICE:
                    $this->setPrice($value);
                    break;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $productArray = [];
        foreach ($this->propertyNames as $propertyName) {
            $productArray[$propertyName] = $this->$propertyName;
        }

        return $productArray;
    }
}
