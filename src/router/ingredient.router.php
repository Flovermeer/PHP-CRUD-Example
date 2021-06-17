<?php

namespace Api;

header('Content-Type: application/json');
$ingredients_controller = require __DIR__ . './../controllers/IngredientController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$query = $_SERVER['QUERY_STRING'] ?? null;

if ($path === '/ingredients' && $method === 'GET') {
    print($ingredients_controller->readAll());
}

if (preg_match('/^(\/ingredients\/)\d+$/', $path) && $method === 'GET') {
    $id = substr(strrchr($path, "/"), 1);
    print($ingredients_controller->readOne($id));
}
