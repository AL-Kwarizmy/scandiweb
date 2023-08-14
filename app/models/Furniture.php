<?php

namespace app\models;

use app\database\Database;

class Furniture extends Product
{
    protected int $height;
    protected int $width;
    protected int $length;

    const TYPE = "Furniture";

    public function setter(array $arr): static
    {
        foreach ($arr as $key => $value)
        {
            $this->{$key} = $value;
        }

        return $this;
    }

    public function create(): void
    {

        Database::create(parent::TABLE_NAME, [$this->sku, $this->name, $this->price, $this->height, $this->width, $this->length, self::TYPE], $this->getClassPropertiesNames());
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length): void
    {
        $this->length = $length;
    }


    public function productDescription(): string
    {
        return "Dimension: {$this->height}x{$this->width}x{$this->length}";
    }

    protected function getClassPropertiesNames(): array
    {
        return array_keys(get_object_vars($this));

    }
}