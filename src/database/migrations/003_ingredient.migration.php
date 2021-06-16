<?php

$db = require(__DIR__ . '/../database.php');

try {
    $ingredients = 'CREATE TABLE ingredients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL
    );';

    $db->exec($ingredients);
} catch (PDOException $e) {
    echo $ingredients . "<br>" . $e->getMessage();
}
