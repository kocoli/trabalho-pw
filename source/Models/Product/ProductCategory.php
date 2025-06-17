<?php

namespace Source\Models\Product;

use Source\Core\Model;

class ProductCategory extends Model
{
    protected $table = "product_categories";

    private $id;
    private $name;

    public function __construct(
        int $id = NULL,
        string $name = NULL
    )
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

}