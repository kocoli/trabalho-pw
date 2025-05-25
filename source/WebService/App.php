<?php

namespace Source\WebService;

class App
{
    public function dashboard() : void
    {
        require __DIR__ ."/../../themes/App/dashboard.php";
    }

    public function registerProducts() : void
    {
        require __DIR__ ."/../../themes/App/cadastroProdutos.php";
    }

    public function preferences() : void
    {
        require __DIR__ ."/../../themes/App/configuracoes.php";
    }
    
    public function ordersApp() : void
    {
        require __DIR__ ."/../../themes/App/pedidos.php";
    }
}