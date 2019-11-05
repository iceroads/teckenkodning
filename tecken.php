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
    $pdo->exec("SET NAMES latin1");

} catch (PDOException $e) {
    // Skriv ut felmeddelandet vi får ifall något har gått fel
    echo $e->getMessage();
    die();
}
// Hämta all data från tabellen users
$stmt = $pdo->query("SELECT * FROM `users`");

/*
 * För varje rad i tabellen, hämta som ett object
 */
while ($row = $stmt->fetchObject()) {
    echo $row->bio . "<br>";
}
