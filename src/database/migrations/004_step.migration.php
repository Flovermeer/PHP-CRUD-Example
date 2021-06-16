<?php

$db = require(__DIR__ . '/../database.php');

try {
    $steps = 'CREATE TABLE steps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description LONGTEXT NOT NULL,
    number INT NOT NULL,
    recipe_id INT NOT NULL,
    FOREIGN KEY (recipe_id) 
        REFERENCES recipes(id)
        ON DELETE CASCADE
    );';

    $db->exec($steps);
} catch (PDOException $e) {
    echo $steps . "<br>" . $e->getMessage();
}
