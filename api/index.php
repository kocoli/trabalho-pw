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
$router->get("/", "Web:home");
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
$router->get("/users", "Users\Users:listUsers");
$router->get("/id/{id}", "Users\Users:listUserById");
$router->post("/add", "Users\Users:createUser");

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