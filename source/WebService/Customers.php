<?php

namespace Source\WebService;

use Source\Models\Salle\Customer;
use Source\WebService\Api; 

class Customers extends Api {

    public function listCustomers (): void 
    {
        $customer = new Customer();
        $this->call(200, "success", "Todos os consumidores!", "success")
            ->back($customer->findAll());
    }

    public function listCustomerById (array $data): void 
    {
        if(!isset($data["id"])) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        if(!filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $customer = new Customer();
        if(!$customer->findById($data["id"])){
            $this->call(200, "success", "Consumidor não encontrado", "error")->back();
            return;
        }
        $response = [
            "name" => $customer->getName(),
            "email" => $customer->getEmail(),
            "address" => $customer->getAddress()
        ];
        $this->call(200, "success", "Cunsumidor encontrado com sucesso", "success")->back($response);
    }

    public function createCostumers(array $data)
    {
        if (empty($data['name']) || empty($data['email']) || empty($data['phone']) || empty($data['address'])) {
            $this->call(400, "bad_request", "Dados inválidos", "error")->back();
            return;
        }

        $customer = new Customer(
            null,
            $data["name"],
            $data["email"],
            $data["phone"],
            $data["address"]
        );

        if(!$customer->insert()){
            $this->call(500, "internal_server_error", $customer->getErrorMessage(), "error")->back();
            return;
        }

        $response = [
            "name" => $customer->getName(),
            "email" => $customer->getEmail(),
            "address" => $customer->getAddress()
        ];

        $this->call(201, "created", "Consumumidor adicionado com sucesso", "success")
            ->back($response);
    }

    public function updateCostumer($data): void
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
        $customer = new Customer();

        if (!$customer->findById($data["id"])) {
            $this->call(404, "not_found", "Consumidor não encontrado", "error")->back();
            return;
        }
        // Atualiza os dados recebidos (se existirem)

        if (isset($data["name"])) {
            $customer->setName($data["name"]);
        }

        if (isset($data["email"])) {
            $customer->setEmail($data["email"]);
        }
    
        if (isset($data["phone"])) {
            $customer->setPhone($data["phone"]);
        }
    
        // Salva no banco
        if (!$customer->updateById()) {
            $this->call(500, "error", "Erro ao atualizar informações do Consumidor", "error")->back();
            return;
        }

        // Retorna sucesso com os dados atualizados
        $response = [
            "name" => $customer->getName(),
            "email" => $customer->getEmail(),
            "address" => $customer->getAddress()
        ];
        $this->call(200, "success", "Dados do consumidor atualizados com sucesso", "success")->back($response);
    }

    public function deleteProduct(array $data): void 
    {
        $customer = new Customer();
    
        if (isset($data["id"])) {
            $deleted = $customer->deleteById((int)$data["id"]);
            
            if ($deleted) {
                echo "Consumidor removido da lista!";
            } else {
                echo "Erro ao remover consumidor: " . $customer->getErrorMessage();
            }
        } else {
            echo "Erro: ID do Consumidor não informado.";
        }
    }
}