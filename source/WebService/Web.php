<?php

namespace Source\WebService;

class Web
{
    public function home() :void
    {
        require __DIR__ . "/../../themes/web/home.php";
    }

    public function about() :void
    {
        require __DIR__ . "/../../themes/web/sobre.php";
    }

    public function contact() :void
    {
        require __DIR__ . "/../../themes/web/contato.php";
    }

    public function faq() :void
    {
        require __DIR__ . "/../../themes/web/faq.php";
    }

    public function login() :void
    {
        require __DIR__ . "/../../themes/web/login.php";
    }

    public function register() :void
    {
        require __DIR__ . "/../../themes/web/cadastro.php";
    }
}