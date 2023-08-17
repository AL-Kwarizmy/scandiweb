<?php

namespace app\models;

use app\database\Database;
use Exception;

class DVD extends Product
{
    protected int $size;

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return void
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function productDescription(): string
    {
        return "Size: {$this->size} MB";
    }

    /**
     * @return Exception|string|null
     */
    public function create(): Exception|string|null
    {
        return Database::create(parent::TABLE_NAME, [$this->sku, $this->name, $this->price, $this->type, $this->size], $this->getClassPropertiesNames());
    }
}