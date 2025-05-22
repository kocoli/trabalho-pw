<?php

namespace Source\Models\User;

class Supplier extends User
{
    private ?string $companyName;
    private ?string $cnpj;

    public function __construct(
        int $id = null,
        int $idType = null,
        string $name = null,
        string $email = null,
        string $password = null,
        string $photo = null,
        string $companyName = null,
        string $cnpj = null,
        string $address = null,
        string $phone = null
    ) {
        parent::__construct($id, $idType, $name, $email, $password, $photo, $address, $phone);
        $this->companyName = $companyName;
        $this->cnpj = $cnpj;
    }

    public function getCompanyName(): ?string 
    { 
        return $this->companyName; 
    }
    public function getCnpj(): ?string 
    { 
        return $this->cnpj; 
    }

    public function setCompanyName(string $companyName): void 
    { 
        $this->companyName = $companyName; 
    }
    public function setCnpj(string $cnpj): void 
    { 
        $this->cnpj = $cnpj; 
    }
}
