<?php

namespace app\models;

use app\database\Database;

class Book extends Product
{
    const TYPE = 'Book';
    protected float $weight;

    public function productDescription(): string
    {
        return "Weight: {$this->weight}KG";
    }

    public function getWeight(): float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    public function setter(array $arr): static
    {
        foreach ($arr as $key => $value)
        {
            $this->{$key} = $value;
        }

        return $this;
    }

    protected function getClassPropertiesNames(): array
    {
        return array_keys(get_object_vars($this));

    }

    public function create(): void
    {
        Database::create(parent::TABLE_NAME, [$this->sku, $this->name, $this->price, $this->weight, self::TYPE], $this->getClassPropertiesNames());
    }
}