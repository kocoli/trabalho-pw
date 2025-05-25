<?php

require __DIR__ . "/../../../source/autoload.php";

use Source\Models\User\User;

$get = $_GET;

$user = new User();
$user->findById($get["id"]);

var_dump($user);

echo json_encode($user);