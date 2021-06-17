<?php

namespace Api;

header('Content-Type: application/json');
$recipes_controller = require __DIR__ . './../controllers/RecipeController.php';

$path = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$query = $_SERVER['QUERY_STRING'] ?? null;

if ($path === '/recipes' && $method === 'GET') {
    print($recipes_controller->readAll());
}

if (preg_match('/^(\/recipes\/)\d+$/', $path) && $method === 'GET') {
    $id = substr(strrchr($path, "/"), 1);
    print($recipes_controller->readOne($id));
}

if (preg_match('/^(\/recipes\/)\d+$/', $path) && $method === 'DELETE') {
    $id = substr(strrchr($path, "/"), 1);
    print($recipes_controller->delete($id));
}

if (preg_match('/^(\/recipes\/)\d+$/', $path) && $method === 'PATCH') {
    $id = substr(strrchr($path, "/"), 1);
    print($recipes_controller->update($id));
    // TODO
}

if ($path === "/recipes" && $method === 'POST') {
    print($recipes_controller->create($_POST));
}
