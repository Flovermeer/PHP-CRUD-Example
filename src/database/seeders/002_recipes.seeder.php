<?php

$db = require __DIR__ . './../database.php';

try {
    $recipes = $db->prepare("INSERT INTO recipes VALUES (
        DEFAULT,
        :name,
        :difficulty,
        :price_category,
        :cooking_time, 
        :baking_time,
        :meal_type,
        :author_id
    );");

    $recipes->bindValue(':name', 'Spicy eggplant pasta');
    $recipes->bindValue(':difficulty', 'Easy');
    $recipes->bindValue(':price_category', 'Cheap');
    $recipes->bindValue(':cooking_time', '30');
    $recipes->bindValue(':baking_time', '20');
    $recipes->bindValue(':meal_type', 'Main dish');
    $recipes->bindValue(':author_id', '1');

    $recipes->execute();
} catch (PDOException $e) {
    echo  $e->getMessage();
}
