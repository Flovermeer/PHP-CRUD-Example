<?php

$db = require(__DIR__ . '/../database.php');

try {
    $users = 'CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(150) NOT NULL,
    lastname VARCHAR(150) NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(100) NOT NULL
    );';

    $db->exec($users);
} catch (PDOException $e) {
    echo $users . "<br>" . $e->getMessage();
}
