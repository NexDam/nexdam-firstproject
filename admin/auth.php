<?php

session_start();

/* SICUREZZA SESSIONI */

ini_set('session.cookie_httponly', 1);

ini_set('session.use_only_cookies', 1);

session_regenerate_id(true);

/* CONTROLLO LOGIN */

if(!isset($_SESSION["user"])){

    header("Location: /login.php");

    exit;

}

/* CONTROLLO RUOLO ADMIN */

if(!isset($_SESSION["role"]) ||
   $_SESSION["role"] != "admin"){

    die("⛔ Access Denied");

}

/* TIMEOUT SESSIONE */

$timeout = 1800; // 30 minuti

if(isset($_SESSION["last_activity"])){

    if(
        time() - $_SESSION["last_activity"]
        > $timeout
    ){

        session_unset();

        session_destroy();

        header("Location: /login.php");

        exit;

    }

}

/* AGGIORNA ATTIVITÀ */

$_SESSION["last_activity"] = time();

?>