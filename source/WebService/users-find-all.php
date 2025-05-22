<?php

require __DIR__ . "/../../vendor/autoload.php";

header('Content-Type: application/json; charset=utf-8');

use Source\Models\User\User;

$users = new User();
echo json_encode($users->findAll(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
