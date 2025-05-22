<?php

namespace Source\Models\User;

class Seller extends User
{
    private ?string $storeName;
    private ?string $cnpj;
    private ?float $rating;

    public function __construct(
        int $id = null,
        int $idType = null,
        string $name = null,
        string $email = null,
        string $password = null,
        string $photo = null,
        string $storeName = null,
        string $cnpj = null,
        float $rating = null,
        string $address = null,
        string $phone = null
    ) {
        parent::__construct($id, $idType, $name, $email, $password, $photo, $address, $phone);
        $this->storeName = $storeName;
        $this->cnpj = $cnpj;
        $this->rating = $rating;
    }

    public function getStoreName(): ?string 
    { 
        return $this->storeName; 
    }
    public function getCnpj(): ?string 
    { 
        return $this->cnpj; 
    }
    public function getRating(): ?float
    { 
        return $this->rating; 
    }

    public function setStoreName(string $storeName): void 
    { 
        $this->storeName = $storeName; 
    }
    public function setCnpj(string $cnpj): void 
    { 
        $this->cnpj = $cnpj; 
    }
    public function setRating(float $rating): void 
    { 
        $this->rating = $rating; 
    }
}
