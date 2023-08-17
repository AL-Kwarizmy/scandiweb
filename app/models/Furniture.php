<?php

namespace app\models;

use app\database\Database;
use Exception;

class Furniture extends Product
{
    protected int $height;
    protected int $width;
    protected int $length;

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return void
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return void
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     * @return void
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function productDescription(): string
    {
        return "Dimension: {$this->height}x{$this->width}x{$this->length}";
    }

    /**
     * @return Exception|string|null
     */
    public function create(): Exception|string|null
    {
        return Database::create(parent::TABLE_NAME, [$this->sku, $this->name, $this->price, $this->type, $this->height, $this->width, $this->length], $this->getClassPropertiesNames());
    }
}