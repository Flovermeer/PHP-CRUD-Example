<?php

namespace Api;

use Api\UserController;

$users_controller = require __DIR__ . './../controllers/UserController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$query = $_SERVER['QUERY_STRING'] ?? null;
$matches = null;

if ($path === '/users' && $method === 'GET') {
    echo $users_controller->readAll();
}

if (preg_match('/^(\/users\/)\d+/', $path) && $method === 'GET') {
    $id = substr(strrchr($path, "/"), 1);
    echo $users_controller->readOne($id);
}

if ($path === "/users" && $method === 'POST') {
}
