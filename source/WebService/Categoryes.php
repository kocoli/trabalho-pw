<?php

namespace Source\WebService;

use Source\Models\Product\ProductCategory;
use Source\WebService\Api;

class Categoryes extends Api
{
    public function listCategoryes(): void
    {
        $categoryes = new ProductCategory();
        $this->call(200, "success", "Lista de Categorias", "success")
            ->back($categoryes->findAll());
    }

    public function listCategoryesById(array $data): void
    {
        if (!isset($data["id"]) || !filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $category = new ProductCategory();
        if (!$category->findById($data["id"])) {
            $this->call(404, "not_found", "Categoria não encontrada", "error")->back();
            return;
        }

        $response = [
            "id" => $category->getId(),
            "name" => $category->getName()
        ];

        $this->call(200, "success", "Categoria encontrada com sucesso", "success")->back($response);
    }

    public function createCategory(array $data): void
    {
        if (empty($data['name'])) {
            $this->call(400, "bad_request", "Nome da categoria é obrigatório", "error")->back();
            return;
        }

        $category = new ProductCategory(null, $data['name']);
        if (!$category->insert()) {
            $this->call(500, "internal_server_error", $category->getErrorMessage(), "error")->back();
            return;
        }

        $response = [
            "id" => $category->getId(),
            "name" => $category->getName()
        ];

        $this->call(201, "created", "Categoria criada com sucesso", "success")->back($response);
    }

    public function updateCategory(array $data): void
    {
        if (!isset($data["id"]) || !filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $category = new ProductCategory();
        if (!$category->findById($data["id"])) {
            $this->call(404, "not_found", "Categoria não encontrada", "error")->back();
            return;
        }

        if (isset($data["name"])) {
            $category->setName($data["name"]);
        }

        if (!$category->updateById()) {
            $this->call(500, "error", "Erro ao atualizar a Categoria", "error")->back();
            return;
        }

        $response = [
            "id" => $category->getId(),
            "name" => $category->getName()
        ];

        $this->call(200, "success", "Categoria atualizada com sucesso", "success")->back($response);
    }

    public function deleteCategory(array $data): void
    {
        if (!isset($data["id"]) || !filter_var($data["id"], FILTER_VALIDATE_INT)) {
            $this->call(400, "bad_request", "ID inválido", "error")->back();
            return;
        }

        $category = new ProductCategory();
        if (!$category->deleteById((int)$data["id"])) {
            $this->call(500, "error", "Erro ao excluir a Categoria", "error")->back();
            return;
        }

        $this->call(200, "success", "Categoria excluída com sucesso", "success")->back();
    }
}
