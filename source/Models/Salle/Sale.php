<?php

namespace Source\Models\Salle;

use Source\Models\Product\Product;
use source\Core\Model;
use DateTime;

class Sale extends Model
{
    private ?int $id;
    private ?Product $product;
    private ?int $quantity;
    private ?float $price;
    private ?DateTime $date;

    public function __construct(
        int $id = null,
        Product $product = null,
        int $quantity = null,
        float $price = null,
        DateTime $date = null
    ) {
        $this->id = $id;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->date = $date;
    }

    public function getId(): ?int 
    { 
        return $this->id; 
    }
    public function getProduct(): ?Product 
    { 
        return $this->product; 
    }
    public function getQuantity(): ?int 
    { 
        return $this->quantity; 
    }
    public function getPrice(): ?float 
    { 
        return $this->price; 
    }
    public function getDate(): ?DateTime 
    { 
        return $this->date; 
    }

    public function setId(int $id): void 
    { 
        $this->id = $id; 
    }
    public function setProduct(Product $product): void 
    { 
        $this->product = $product; 
    }
    public function setQuantity(int $quantity): void 
    { 
        $this->quantity = $quantity; 
    }
    public function setPrice(float $price): void 
    { 
        $this->price = $price; 
    }
    public function setDate(DateTime $date): void 
    { 
        $this->date = $date; 
    }
}
