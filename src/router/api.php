<?php

namespace Api;

use Api\UserController;

header('Content-Type: application/json');
$users_controller = require __DIR__ . './../controllers/UserController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$query = $_SERVER['QUERY_STRING'] ?? null;
$matches = null;

if ($path === '/users' && $method === 'GET') {
    print($users_controller->readAll());
}

if (preg_match('/^(\/users\/)\d+/', $path) && $method === 'GET') {
    $id = substr(strrchr($path, "/"), 1);
    print($users_controller->readOne($id));
}

if (preg_match('/^(\/users\/)\d+/', $path) && $method === 'DELETE') {
    $id = substr(strrchr($path, "/"), 1);
    print($users_controller->delete($id));
}

if (preg_match('/^(\/users\/)\d+/', $path) && $method === 'PATCH') {
    // $id = substr(strrchr($path, "/"), 1);
    // print($users_controller->update($id));
    // TODO
}

if ($path === "/users" && $method === 'POST') {
    print($users_controller->create($_POST));
}
