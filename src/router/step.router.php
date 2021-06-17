<?php

namespace Api;

header('Content-Type: application/json');
$steps_controller = require __DIR__ . './../controllers/StepController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$query = $_SERVER['QUERY_STRING'] ?? null;

if ($path === '/steps' && $method === 'GET') {
    print($steps_controller->readAll());
}

if (preg_match('/^(\/steps\/)\d+$/', $path) && $method === 'GET') {
    $id = substr(strrchr($path, "/"), 1);
    print($steps_controller->readOne($id));
}

if (preg_match('/^(\/steps\/)\d+$/', $path) && $method === 'DELETE') {
    $id = substr(strrchr($path, "/"), 1);
    print($steps_controller->delete($id));
}

if (preg_match('/^(\/steps\/)\d+$/', $path) && $method === 'PATCH') {
    $id = substr(strrchr($path, "/"), 1);
    print($steps_controller->update($id));
    // TODO
}

if ($path === "/steps" && $method === 'POST') {
    print($steps_controller->create($_POST));
}
