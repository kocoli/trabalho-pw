<?php

ob_start();

require  __DIR__ . "/../vendor/autoload.php";

// os headers abaixo são necessários para permitir o acesso a API por clientes externos ao domínio
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header('Access-Control-Allow-Credentials: true'); // Permitir credenciais

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

use CoffeeCode\Router\Router;

$router = new Router("http://localhost/trabalho-PW/api" , ":");

$router->namespace("Source\WebService");

//Rota pública: WEB
$router->get("/home", "Web:home");
$router->get("/sobre", "Web:about");
$router->get("/contato", "Web:contact");
$router->get("/faq", "Web:faq");
$router->get("/login", "Web:login");
$router->get("/cadastro", "Web:register");

//Rotas da aplicação: App
$router->get("/dashboard", "App:dashboard");
$router->get("/produtos", "App:registerProducts");
$router->get("/pedidos", "App:ordersApp");
$router->get("/preferencias", "App:preferences");

//Rota para Users
// http://localhost/trabalho-PW/api/
$router->get("/", "Users:listUsers");
// http://localhost/trabalho-PW/api/id/
$router->get("/id/{id}", "Users:listUserById");
// http://localhost/trabalho-PW/api/add
$router->post("/add", "Users:createUser");
// http://localhost/trabalho-PW/api/update/
$router->put("/update/{id}", "Users:updateUser");
// http://localhost/trabalho-PW/api/delete/id/
$router->delete("/delete/id/{id}", "Users:deleteUser");

//Rotas para Products
$router->group("/products");
// http://localhost/trabalho-PW/api/products/
$router->get("/", "Products:listProducts");
// http://localhost/trabalho-PW/api/products/id/
$router->get("/id/{id}", "Products:listProductsById");
// http://localhost/trabalho-PW/api/products/add
$router->post("/add", "Products:createProduct");
// http://localhost/trabalho-PW/api/products/update/{id}
$router->put("/update/{id}", "Products:updateProduct");
// http://localhost/trabalho-PW/api/products/delete/id/{id}
$router->delete("/delete/id/{id}", "Products:deleteProduct");

//Rotas para Categorias dos produtos
$router->group("/category");
// http://localhost/trabalho-PW/api/category/
$router->get("/", "Categoryes:listCategoryes");
// http://localhost/trabalho-PW/api/category/id/
$router->get("/id/{id}", "Categoryes:listCategoryesById");
// http://localhost/trabalho-PW/api/category/add
$router->post("/add", "Categoryes:createCategory");
// http://localhost/trabalho-PW/api/category/update/{id}
$router->put("/update/{id}", "Categoryes:updateCategory");
// http://localhost/trabalho-PW/api/category/delete/id/{id}
$router->delete("/delete/id/{id}", "Categoryes:deleteCategory");

//Rotas para consumidores
$router->group("/customer");
// http://localhost/trabalho-PW/api/customer/
$router->get("/", "Customers:listCustomers");
// http://localhost/trabalho-PW/api/customer/id/
$router->get("/id/{id}", "Customers:listCustomerById");
// http://localhost/trabalho-PW/api/customer/add
$router->post("/add", "Customers:createCostumers");
// http://localhost/trabalho-PW/api/customer/update/{id}
$router->put("/update/{id}", "Customers:updateCostumer");
// http://localhost/trabalho-PW/api/customer/delete/id/{id}
$router->delete("/delete/id/{id}", "Customers:deleteProduct");

$router->dispatch();

/** ERROR REDIRECT */
if ($router->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "code" => 404,
        "status" => "not_found",
        "message" => "URL não encontrada"
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}

ob_end_flush();