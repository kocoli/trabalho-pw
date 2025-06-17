<?php 

namespace Source\Models\Product;

use Source\Core\Model;
use Source\Core\Connect;

class Product extends Model
{
    protected $table = "products";

    private $id;
    private $idCategory;
    private $name;
    private $price;

    public function __construct(
        int $id = null,
        int $idCategory = null,
        string $name = null,
        float $price = null
    )
    {
        $this->id = $id;
        $this->idCategory = $idCategory;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): ?int { return $this->id; }
    public function setId(?int $id): void { $this->id = $id; }

    public function getIdCategory(): ?int { return $this->idCategory; }
    public function setIdCategory(?int $idCategory): void { $this->idCategory = $idCategory; }

    public function getName(): ?string { return $this->name; }
    public function setName(?string $name): void { $this->name = $name; }

    public function getPrice(): ?float { return $this->price; }
    public function setPrice(?float $price): void { $this->price = $price; }

    // Buscar todos os produtos
    // public function listAll(): array
    // {
    //     $query = "SELECT * FROM products";
    //     $stmt = Connect::getInstance()->prepare($query);

    //     try {
    //         $stmt->execute();
    //         return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    //     } catch (\PDOException $e) {
    //         $this->errorMessage = "Erro ao buscar produtos: {$e->getMessage()}";
    //         return [];
    //     }
    // }

    // Buscar produto por ID
    public function findById(int $id): bool
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindValue(":id", $id);

        try {
            $stmt->execute();
            $result = $stmt->fetch();

            if (!$result) {
                return false;
            }

            $this->id = $result->id;
            $this->idCategory = $result->idCategory;
            $this->name = $result->name;
            $this->price = $result->price;

            return true;
        } catch (\PDOException $e) {
            $this->errorMessage = "Erro ao buscar produto: {$e->getMessage()}";
            return false;
        }
    }

    // Inserir produto
    public function insert(): bool
    {
        $query = "INSERT INTO products (idCategory, name, price) VALUES (:idCategory, :name, :price)";
        $stmt = Connect::getInstance()->prepare($query);

        try {
            $stmt->bindValue(":idCategory", $this->idCategory);
            $stmt->bindValue(":name", $this->name);
            $stmt->bindValue(":price", $this->price);
            $stmt->execute();

            $this->id = Connect::getInstance()->lastInsertId();

            return true;
        } catch (\PDOException $e) {
            $this->errorMessage = "Erro ao inserir produto: {$e->getMessage()}";
            return false;
        }
    }

    // Atualizar produto
    public function update(): bool
    {
        $query = "UPDATE products SET idCategory = :idCategory, name = :name, price = :price WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);

        try {
            $stmt->bindValue(":id", $this->id);
            $stmt->bindValue(":idCategory", $this->idCategory);
            $stmt->bindValue(":name", $this->name);
            $stmt->bindValue(":price", $this->price);
            return $stmt->execute();
        } catch (\PDOException $e) {
            $this->errorMessage = "Erro ao atualizar produto: {$e->getMessage()}";
            return false;
        }
    }

    // Deletar produto por ID
    public function deleteById(int $id): bool
    {
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);

        try {
            $stmt->bindValue(":id", $id);
            return $stmt->execute();
        } catch (\PDOException $e) {
            $this->errorMessage = "Erro ao deletar produto: {$e->getMessage()}";
            return false;
        }
    }
}