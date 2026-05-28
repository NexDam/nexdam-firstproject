<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {

    $conn = new mysqli(
        "localhost",
        "davide",
        "password",
        "mydb"
    );

    echo "<h1>✅ Connessione MariaDB riuscita!</h1>";

    echo "<p>Apache + PHP + MariaDB funzionano 🚀</p>";

} catch (Exception $e) {

    die("ERRORE MYSQL: " . $e->getMessage());

}

?>
