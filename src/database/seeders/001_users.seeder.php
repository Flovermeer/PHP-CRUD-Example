<?php

$db = require __DIR__ . './../database.php';

$password = password_hash('password', PASSWORD_ARGON2I);
$counts = 10;
$firstnames = ['John', 'Jane', 'Suzy', 'Albert', 'Eric', 'Sarah', 'Tony', 'Stephen', 'Alicia', 'Mandy'];
$lastnames = ['Doe', 'Cook', 'Tanner', 'Taylor', 'Barber', 'Backland', 'Smith', 'Spring', 'Summers', 'Hunger'];

try {
    $users = $db->prepare("INSERT INTO users VALUES (
    DEFAULT, 
    :firstname, 
    :lastname, 
    :username, 
    :email, 
    :password
    );");

    for ($i = 0; $i < $counts; $i++) {
        $users->bindValue(':firstname', $firstnames[$i]);
        $users->bindValue(':lastname', $lastnames[$i]);
        $users->bindValue(':email', "$firstnames[$i]@mail.com");
        $users->bindValue(':username', "$firstnames[$i]01");
        $users->bindValue(':password', $password);

        $users->execute();
    }
} catch (PDOException $e) {
    echo  $e->getMessage();
}
