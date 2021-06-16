<?php

$db = require(__DIR__ . '/../database.php');

try {
    $recipes_ingredients = 'CREATE TABLE recipes_ingredients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    ingredient_id INT NOT NULL,
    FOREIGN KEY (recipe_id) 
        REFERENCES recipes(id)
        ON DELETE CASCADE,
    FOREIGN KEY (ingredient_id) 
        REFERENCES ingredients(id)
        ON DELETE RESTRICT
    );';

    $db->exec($recipes_ingredients);
} catch (PDOException $e) {
    echo $recipes_ingredients . "<br>" . $e->getMessage();
}
