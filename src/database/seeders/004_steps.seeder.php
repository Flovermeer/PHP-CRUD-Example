<?php

$db = require __DIR__ . './../database.php';

try {
    $steps = $db->prepare("INSERT INTO steps VALUES(
        DEFAULT,
        :name,
        :description,
        :number,
        :recipe_id
    );");
} catch (PDOException $e) {
    echo $e->getMessage();
}
