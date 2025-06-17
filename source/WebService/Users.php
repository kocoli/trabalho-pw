<?php

namespace Source\WebService;

use Source\Models\User\User;
use Source\WebService\Api;
use Source\Core\JWTToken;

class Users extends Api
{
    public function listUsers(): void //users-find-all
    {
        $users = new User();
        $this->call(200, "success", "Lista de usuários", "success")
            ->back($users->findAll());
    }

    public function listUserById(array $data): void //users-find-by-id
    {
        if (!isset($data["id"]) || !filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $user = new User();
        if (!$user->findById($data["id"])) {
            $this->call(404, "not_found", "Usuário não encontrado", "error")->back();
            return;
        }

        $response = [
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ];
        $this->call(200, "success", "Usuário encontrado", "success")->back($response);
    }

    public function createUser(array $data): void
    {
        if (empty($data['idType']) || empty($data['name']) || empty($data['email']) || empty($data['password'])) {
            $this->call(400, "bad_request", "Dados inválidos", "error")->back();
            return;
        }

        $user = new User(
            null,
            (int) $data["idType"],
            $data["name"],
            $data["email"],
            $data["password"]
        );

        if (!$user->insert()) {
            $this->call(500, "internal_server_error", $user->getErrorMessage(), "error")->back();
            return;
        }

        $response = [
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ];

        $this->call(201, "created", "Usuário criado com sucesso", "success")
            ->back($response);
    }

    public function updateUser(array $data): void
    {
        $this->auth();

        if (!isset($data["id"]) || !filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $user = new User();

        if (!$user->findById($data["id"])) {
            $this->call(404, "not_found", "Usuário não encontrado", "error")->back();
            return;
        }

        if (isset($data["name"])) {
            $user->setName($data["name"]);
        }

        if (isset($data["email"])) {
            $user->setEmail($data["email"]);
        }

        if (!$user->updateById()) {
            $this->call(500, "internal_server_error", "Erro ao atualizar usuário", "error")->back();
            return;
        }

        $response = [
            "id" => $user->getId(),
            "name" => $user->getName(),
            "email" => $user->getEmail()
        ];

        $this->call(200, "success", "Usuário atualizado com sucesso", "success")->back($response);
    }

    public function deleteUser(array $data): void // delete-users
    {
        $this->auth(); 

        if (!isset($data["id"]) || !filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $user = new User();
        $deleted = $user->deleteById((int) $data["id"]);

        if ($deleted) {
            $this->call(200, "success", "Usuário excluído com sucesso!", "success")->back();
        } else {
            $this->call(500, "internal_server_error", "Erro ao excluir usuário: " . $user->getErrorMessage(), "error")->back();
        }
    }

    public function login(array $data): void
    {
        if (empty($data["email"]) || empty($data["password"])) {
            $this->call(400, "bad_request", "Credenciais inválidas", "error")->back();
            return;
        }

        $user = new User();

        if (!$user->findByEmail($data["email"])) {
            $this->call(401, "unauthorized", "Usuário não encontrado", "error")->back();
            return;
        }

        if (!password_verify($data["password"], $user->getPassword())) {
            $this->call(401, "unauthorized", "Senha inválida", "error")->back();
            return;
        }

        $jwt = new JWTToken();
        $token = $jwt->create([
            "email" => $user->getEmail(),
            "name" => $user->getName(),
            "rule" => $user->getIdType()
        ]);

        $this->call(200, "success", "Login realizado com sucesso", "success")
            ->back([
                "token" => $token,
                "user" => [
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail()
                ]
            ]);
    }
}
