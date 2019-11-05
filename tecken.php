<?php

$database_user = 'root';
$database_password = '';

// Starta en ny anslutning till databasen
// try catch är ett sätt att ta reda på om anslutningen lyckades
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=tecken', $database_user, $database_password);

    /*
     * Om vi inte sätter ett charset för anslutningen till PDO
     * kommer Mysql välja den standard som är konfigurerad.
     *
     * I med vår databas är i latin1_swedish_ci vill vi använda latin1
     * i detta fallet.
     */
    //$pdo->exec("SET NAMES latin1");

    /*
     * Genom att tvinga anslutningen till att läsa och skriva i UTF8 kan vi
     * spara text som UTF8 även om databasen är latin1
     */

    $pdo->exec("SET NAMES utf8");
} catch (PDOException $e) {
    // Skriv ut felmeddelandet vi får ifall något har gått fel
    echo $e->getMessage();
    die();
}

$user_bio = 'Jag gillar teckenkodning och är sjukt 
             intresserad av allt med ÅÄÖ och andra konstiga tecken
            ';

// Skicka in ovanstående text till databasen.
$pdo->query("INSERT INTO `users`(bio) VALUES('{$user_bio}')");
