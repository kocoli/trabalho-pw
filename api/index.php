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

$route = new Router("http://localhost/trabalho-PW/api");

$route->namespace("Source\WebService");

//http://localhost/trabalho-PW/api
$route->get("/", "Site:home");

// http://localhost/trabalho-PW/api/about
$route->get("/sobre", "Site:about");

// http://localhost/trabalho-PW/api/contato
$route->get("/contato", "Site:contact");

// http://localhost/trabalho-PW/api/faq
$route->get("/faq", "Site:faq");

// http://localhost/trabalho-PW/api/login
$route->get("/login", "Site:login");

// http://localhost/trabalho-PW/api/cadastro
$route->get("/cadastro", "Site:register");

$route->dispatch();