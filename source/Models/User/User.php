<?php

namespace Source\Models\User;

use Source\Core\Model;
use Source\Core\Connect;
use \PDOException;

class User extends Model
{
    private ?int $id;
    private ?int $idType;
    private ?string $name;
    private ?string $email;
    private ?string $password;
    private ?string $photo;
    private ?string $address;
    private ?string $phone;

    public function __construct
    (
        int $id = null, 
        int $idType = null,
        string $name = null,
        string $email = null,
        string $password = null,
        string $photo = null,
        string $address = null,
        string $phone = null
    )
    {
        $this->table = "users";
        $this->id = $id;
        $this->idType = $idType;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->photo = $photo;
        $this->address = $address;
        $this->phone = $phone;
    }

    public function getId(): ?int 
    { 
        return $this->id;
    }
    public function getIdType(): ?int 
    { 
        return $this->idType; 
    }
    public function getName(): ?string
    { 
        return $this->name;
    }
    public function getEmail(): ?string 
    { 
        return $this->email; 
    }
    public function getPassword(): ?string
    { 
        return $this->password;
    }
    public function getPhoto(): ?string 
    { 
        return $this->photo; 
    }
    public function getAddress(): ?string 
    { 
        return $this->address; 
    }
    public function getPhone(): ?string 
    { 
        return $this->phone;
    }

    public function setName(string $name): void 
    { 
        $this->name = $name; 
    }
    public function setEmail(string $email): void 
    { 
        $this->email = $email; 
    }
    public function setPassword(string $password): void 
    { 
        $this->password = $password; 
    }
    public function setPhoto(string $photo): void 
    { 
        $this->photo = $photo; 
    }
    public function setAddress(string $address): void 
    { 
        $this->address = $address; 
    }
    public function setPhone(string $phone): void 
    { 
        $this->phone = $phone; 
    }

    public function insert (): bool
    {

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = "E-mail inválido";
            return false;
        }

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(":email", $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $this->errorMessage = "E-mail já cadastrado";
            return false;
        }

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        if(!parent::insert()){
            $this->errorMessage = "Erro ao inserir o registro: {$this->getErrorMessage()}";
            return false;
        }

        return true;
    }

    public function findByEmail (string $email): bool
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($sql);
        $stmt->bindValue(":email", $email);

        try {
            $stmt->execute();
            $result = $stmt->fetch();
            if (!$result) {
                return false;
            }
            $this->id = $result->id;
            $this->idType = $result->idType;
            $this->name = $result->name;
            $this->email = $result->email;
            $this->password = $result->password;
            $this->photo = $result->photo;
            $this->address = $result->address;
            $this->phone = $result->phone;

            return true;
        } catch (PDOException $e) {
            $this->errorMessage = "Erro ao buscar o registro: {$e->getMessage()}";
            return false;
        }

    }
}
