<?php

namespace Source\Models\Salle;

use Source\Models\Product\Product;
use Source\Models\User\Customer;

class Order {
    private ?int $id;
    private ?Customer $customer;
    private ?Product $product;
    private ?int $quantity;
    private ?float $totalPrice;

    public function __construct
    (
        int $id = null,
        Customer $customer = null,
        Product $product = null,
        int $quantity = null,
        float $totalPrice = null
    )
    {
        $this->id = $id;
        $this->customer = $customer;
        $this->product = $product;
        $this->quantity = $quantity;
        $this->totalPrice = $totalPrice;
    }

    public function getId(): ?int 
    { 
        return $this->id; 
    }
    public function getCustomer(): ?Customer 
    { 
        return $this->customer; 
    }
    public function getProduct(): ?Product 
    { 
        return $this->product; 
    }
    public function getQuantity(): ?int 
    { 
        return $this->quantity; 
    }
    public function getTotalPrice(): ?float 
    { 
        return $this->totalPrice; 
    }

    public function setId(int $id): void 
    { 
        $this->id = $id; 
    }
    public function setCustomer(Customer $customer): void 
    { 
        $this->customer = $customer; 
    }
    public function setProduct(Product $product): void 
    { 
        $this->product = $product; 
    }
    public function setQuantity(int $quantity): void 
    { 
        $this->quantity = $quantity; 
    }
    public function setTotalPrice(float $totalPrice): void 
    { 
        $this->totalPrice = $totalPrice; 
    }
}

