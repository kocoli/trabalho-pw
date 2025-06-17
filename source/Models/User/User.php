<?php

namespace Source\Models\User;

use Source\Core\Model;
use Source\Core\Connect;
use \PDOException;

class User extends Model
{
    protected $table = "users";

    private ?int $id;
    private ?int $idType;
    private ?string $name;
    private ?string $email;
    private ?string $password;

    public function __construct(
        ?int $id = null, 
        ?int $idType = null, 
        ?string $name = null, 
        ?string $email = null, 
        ?string $password = null
    )
    {
        $this->id = $id;
        $this->idType = $idType;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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

    // public function insert (): bool
    // {

    //     if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
    //         $this->errorMessage = "E-mail inválido";
    //         return false;
    //     }

    //     $sql = "SELECT * FROM users WHERE email = :email";
    //     $stmt = Connect::getInstance()->prepare($sql);
    //     $stmt->bindValue(":email", $this->email);
    //     $stmt->execute();

    //     if ($stmt->rowCount() > 0) {
    //         $this->errorMessage = "E-mail já cadastrado";
    //         return false;
    //     }

    //     $this->password = password_hash($this->password, PASSWORD_DEFAULT);

    //     if(!parent::insert()){
    //         $this->errorMessage = "Erro ao inserir o registro: {$this->getErrorMessage()}";
    //         return false;
    //     }

    //     return true;
    // }

    // public function findByEmail (string $email): bool
    // {
    //     $sql = "SELECT * FROM users WHERE email = :email";
    //     $stmt = Connect::getInstance()->prepare($sql);
    //     $stmt->bindValue(":email", $email);

    //     try {
    //         $stmt->execute();
    //         $result = $stmt->fetch(\PDO::FETCH_OBJ);
    //         if (!$result) {
    //             return false;
    //         }
    //         $this->id = $result->id;
    //         $this->idType = $result->idType;
    //         $this->name = $result->name;
    //         $this->email = $result->email;
    //         $this->password = $result->password;

    //         return true;
    //     } catch (PDOException $e) {
    //         $this->errorMessage = "Erro ao buscar o registro: {$e->getMessage()}";
    //         return false;
    //     }

    // }

    // public function updateById(): bool
    // {
    //     try {
    //         $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    //         $stmt = Connect::getInstance()->prepare($sql);
    //         $stmt->bindValue(":name", $this->name);
    //         $stmt->bindValue(":email", $this->email);
    //         $stmt->bindValue(":id", $this->id);

    //         if ($stmt->execute()) {
    //             return true;
    //         } else {
    //             $this->errorMessage = "Erro ao executar update";
    //             return false;
    //         }
    //     } catch (\PDOException $e) {
    //         $this->errorMessage = "Erro ao atualizar: " . $e->getMessage();
    //         return false;
    //     }
    // }

    // public function deleteById(int $id): bool
    // {
    //     try {
    //     $stmt = Connect::getInstance()->prepare("DELETE FROM {$this->table} WHERE id = :id");
    //     $stmt->bindValue(":id", $id); 
    //     $stmt->execute();

    //     if ($stmt->rowCount() === 0) {
    //         return false; // Nenhuma linha foi afetada (ID não encontrado)
    //     }

    //     return true;
    //     } catch (PDOException $e) {
    //     $this->errorMessage = "Erro ao excluir o registro: {$e->getMessage()}";
    //     return false;
    //     }
    // }
}
