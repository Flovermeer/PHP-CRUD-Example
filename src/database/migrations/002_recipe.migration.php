<?php

$db = require(__DIR__ . '/../database.php');

try {
    $recipes = 'CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    difficulty ENUM("Easy", "Medium", "Hard") NOT NULL,
    price_category ENUM ("Cheap", "Normal", "Expensive") NOT NULL,
    cooking_time INT NOT NULL,
    baking_time INT,
    meal_type ENUM ("Starter", "Main dish", "Dessert", "Drink"),
    author_id INT NOT NULL,
    FOREIGN KEY (author_id) 
        REFERENCES users(id)
        ON DELETE CASCADE
    );';

    $db->exec($recipes);
} catch (PDOException $e) {
    echo $recipes . "<br>" . $e->getMessage();
}
