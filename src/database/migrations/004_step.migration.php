<?php

$db = require(__DIR__ . '/../database.php');

try {
    $steps = 'CREATE TABLE steps (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description LONGTEXT NOT NULL,
    number INT NOT NULL,
    recipe_id INT NOT NULL,
    FOREIGN KEY (recipe_id) 
        REFERENCES recipes(id)
        ON DELETE CASCADE
    UNIQUE unique_index(number, recipe_id)
    );';

    $db->exec($steps);
} catch (PDOException $e) {
    echo $steps . "<br>" . $e->getMessage();
}
