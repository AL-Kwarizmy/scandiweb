<?php

namespace app\models;

use app\database\Database;
use Exception;

abstract class Product
{
    protected int $id;
    protected string $sku;
    protected string $name;
    protected float $price;
    protected string $type;
    protected const TABLE_NAME = "products";

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return void
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return void
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
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
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     * @return void
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param array $arr
     * @return void
     */
    public function setter(array $arr): void
    {
        foreach ($arr as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * @return array
     */
    protected function getClassPropertiesNames(): array
    {
        return array_keys(get_object_vars($this));

    }

    /**
     * @return string
     */
    abstract public function productDescription(): string;

    /**
     * @return Exception|string|null
     */
    abstract public function create(): Exception|string|null;

    /**
     * @return false|array
     */
    public static function get(): false|array
    {
        return Database::get(self::TABLE_NAME);
    }

    /**
     * @param array $ids
     * @return void
     */
    public static function delete(array $ids): void
    {
        Database::delete(self::TABLE_NAME, $ids);
    }
}