<?php

namespace Source\WebService;

use Source\Models\Product\Product;
use Source\WebService\Api; 

class Products extends Api {

    public function listProducts (): void //products-find-all
    {
        $products = new Product();
        //var_dump($products->findAll());
        $this->call(200, "success", "Lista de Produtos", "success")
            ->back($products->findAll());
    }

    public function listProductsById (array $data): void //products-find-by-id
    {

        if(!isset($data["id"])) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        if(!filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $product = new Product();
        if(!$product->findById($data["id"])){
            $this->call(200, "success", "Produto não encontrado", "error")->back();
            return;
        }
        $response = [
            "id" => $product->getId(),
            "idCategory" => $product->getIdCategory(),
            "name" => $product->getName(),
            "price" => $product->getPrice()
        ];
        $this->call(200, "success", "Produto encontrado com sucesso", "success")->back($response);
    }

    public function createproduct(array $data)
    {
        if (empty($data['idCategory']) || empty($data['name']) || empty($data['price'])) {
            $this->call(400, "bad_request", "Dados inválidos", "error")->back();
            return;
        }

        $product = new Product(
            null,
            (int) $data["idCategory"],
            $data["name"],
            $data["price"]
        );

        if(!$product->insert()){
            $this->call(500, "internal_server_error", $product->getErrorMessage(), "error")->back();
            return;
        }

        $response = [
            "idCategory" => $product->getIdCategory(),
            "name" => $product->getName(),
            "price" => $product->getPrice()
        ];

        $this->call(201, "created", "Produto adicionado com sucesso", "success")
            ->back($response);
    }

    public function updateProduct($data): void
    {
        if (!isset($data["id"])) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        if (!filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        // Busca o produto pelo ID
        $product = new product();

        if (!$product->findById($data["id"])) {
            $this->call(404, "not_found", "Produto não encontrado", "error")->back();
            return;
        }
        // Atualiza os dados recebidos (se existirem)

        if (isset($data["idCategory"])) {
            $product->setIdCategory($data["idCategory"]);
        }

        if (isset($data["name"])) {
            $product->setName($data["name"]);
        }
    
        if (isset($data["price"])) {
            $product->setPrice($data["price"]);
        }
    
        // Salva no banco
        if (!$product->updateById()) {
            $this->call(500, "error", "Erro ao atualizar iformações do Produto", "error")->back();
            return;
        }

        // Retorna sucesso com os dados atualizados
        $response = [
            "idCategory" => $product->getIdCategory(),
            "name" => $product->getName(),
            "price" => $product->getPrice()
        ];
        $this->call(200, "success", "Produto atualizado com sucesso", "success")->back($response);
    }

    public function deleteProduct(array $data): void // delete-products
    {
        $product = new product();
    
        if (isset($data["id"])) {
            $deleted = $product->deleteById((int)$data["id"]);
            
            if ($deleted) {
                echo "Produto excluído com sucesso!";
            } else {
                echo "Erro ao excluir Produto: " . $product->getErrorMessage();
            }
        } else {
            echo "Erro: ID do Produto não informado.";
        }
    }
}