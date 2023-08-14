<?php

namespace app\models;

use app\database\Database;

class DVD extends Product
{
    const TYPE = 'DVD';
    protected int $size;

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function productDescription(): string
    {
        return "Size: {$this->size} MB";
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
        Database::create(parent::TABLE_NAME, [$this->sku, $this->name, $this->price, $this->size, self::TYPE], $this->getClassPropertiesNames());
    }
}