<?php

$db = require __DIR__ . './../database.php';
$names = ['eggplant', 'salt', 'black pepper', 'onion', 'garlic', 'tomatoe', 'red pepper', 'basil', 'linguine pasta'];

try {
    $ingredients = $db->prepare("INSERT INTO ingredients VALUES (
        DEFAULT,
        :name
    );");

    foreach ($names as $i) {
        $ingredients->bindValue(':name', $i);
        $ingredients->execute();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
