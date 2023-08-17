<?php

namespace app\models;

use app\database\Database;

class Book extends Product
{
    protected float $weight;

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return void
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return string
     */
    public function productDescription(): string
    {
        return "Weight: {$this->weight}KG";
    }

    /**
     * @return \Exception|string|null
     */
    public function create(): \Exception|string|null
    {
        return Database::create(parent::TABLE_NAME, [$this->sku, $this->name, $this->price, $this->type, $this->weight], $this->getClassPropertiesNames());
    }
}