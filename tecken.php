<?php

$database_user = 'root';
$database_password = '';

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=tecken', $database_user, $database_password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$user_bio = 'Jag gillar teckenkodning och är sjukt 
             intresserad av allt med ÅÄÖ och andra konstiga tecken
            ';

$pdo->query("INSERT INTO `users`(bio) VALUES('{$user_bio}')");
