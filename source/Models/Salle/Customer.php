<?php
namespace Source\Models\Salle;

use Source\Core\Model;

class Customer extends Model
{
    protected $table = "customers";

    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $phone;
    private ?string $address;

    public function __construct
    (
        ?int $id = null, 
        ?string $name = null, 
        ?string $email = null, 
        ?string $phone = null, 
        ?string $address = null
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    // Setters
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
}
