<?php

namespace app\models;

use app\database\Database;

abstract class Product
{
    protected string $sku;
    protected string $name;
    protected float $price;
    protected const TABLE_NAME = "products";

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    abstract public function productDescription(): string;

    abstract public function setter(array $arr);

    abstract protected function getClassPropertiesNames(): array;

    abstract public function create();

    public static function get(): false|array
    {
        return Database::get(self::TABLE_NAME);
    }
}