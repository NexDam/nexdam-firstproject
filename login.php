<?php

session_start();

/* SICUREZZA SESSIONI */

ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);

session_regenerate_id(true);

/* CONNESSIONE DATABASE */

$conn = new mysqli(
    "localhost",
    "davide",
    "password",
    "mydb"
);

$error = "";

/* RATE LIMIT LOGIN */

$_SESSION["attempts"] =
($_SESSION["attempts"] ?? 0);

if($_SESSION["attempts"] > 5){

    die("Troppi tentativi di login. Riprova più tardi.");

}

/* CONTROLLO CONNESSIONE DB */

if($conn->connect_error){

    die("Errore connessione database");

}

/* LOGIN */

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_POST["username"]);

    $password = $_POST["password"];

    /* CERCA UTENTE */

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username=?"
    );

    $stmt->bind_param("s", $username);

    $stmt->execute();

    $result = $stmt->get_result();

    /* UTENTE TROVATO */

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        /* PASSWORD VERIFY */

        if(password_verify(
            $password,
            $user["password"]
        )){

            /* RESET ATTEMPTS */

            $_SESSION["attempts"] = 0;

            /* SESSIONI */

            $_SESSION["id"] = $user["id"];

            $_SESSION["user"] = $user["username"];

            $_SESSION["role"] = $user["role"];

            /* REDIRECT */

            if($user["role"] == "admin"){

                header(
                    "Location: /admin/dashboard.php"
                );

            } else {

                header(
                    "Location: /index.php"
                );

            }

            exit;

        } else {

            $_SESSION["attempts"]++;

            $error = "Password errata";

        }

    } else {

        $_SESSION["attempts"]++;

        $error = "Utente non trovato";

    }

}

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<meta
http-equiv="Cache-Control"
content="no-cache, no-store, must-revalidate"
>

<meta
http-equiv="Pragma"
content="no-cache"
>

<meta
http-equiv="Expires"
content="0"
>

<title>Login</title>

<link rel="stylesheet" href="../css/admin.css">

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;

}

body{

    background:#0f172a;

    font-family:Arial,sans-serif;

    color:white;

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    overflow:hidden;

}

.login-container{

    width:100%;

    display:flex;

    justify-content:center;

    align-items:center;

    padding:20px;

}

.login-box{

    width:100%;

    max-width:430px;

    background:#1e293b;

    padding:45px;

    border-radius:24px;

    box-shadow:
    0 0 40px rgba(0,0,0,0.45);

    border:1px solid
    rgba(255,255,255,0.06);

    backdrop-filter:blur(10px);

}

.login-box h1{

    margin-bottom:30px;

    text-align:center;

    color:#60a5fa;

    font-size:2rem;

}

input{

    width:100%;

    padding:15px;

    margin-top:18px;

    border:none;

    border-radius:12px;

    background:#0f172a;

    color:white;

    font-size:15px;

    outline:none;

    border:1px solid
    rgba(255,255,255,0.05);

    transition:0.3s;

}

input:focus{

    border:1px solid #2563eb;

    box-shadow:
    0 0 15px rgba(37,99,235,0.25);

}

button{

    width:100%;

    padding:15px;

    margin-top:24px;

    border:none;

    border-radius:12px;

    background:#2563eb;

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;

    transition:0.3s;

}

button:hover{

    background:#1d4ed8;

    transform:translateY(-2px);

    box-shadow:
    0 0 20px rgba(37,99,235,0.35);

}

.error{

    margin-top:20px;

    color:#ef4444;

    text-align:center;

    font-weight:bold;

}

.info{

    margin-top:28px;

    text-align:center;

    color:#94a3b8;

    font-size:14px;

}

.register-link{

    margin-top:22px;

    text-align:center;

    color:#94a3b8;

}

.register-link a{

    color:#60a5fa;

    text-decoration:none;

    font-weight:bold;

    transition:0.3s;

}

.register-link a:hover{

    color:#2563eb;

}

.security-badge{

    margin-top:25px;

    text-align:center;

    font-size:13px;

    color:#22c55e;

}

</style>

</head>

<body>

<div class="login-container">

<div class="login-box">

<h1>

🔐 Login

</h1>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required
autocomplete="off"
>

<input
type="password"
name="password"
placeholder="Password"
required
autocomplete="off"
>

<button type="submit">

Login

</button>

</form>

<div class="error">

<?php echo $error; ?>

</div>

<div class="info">

Apache2 • PHP • MariaDB • WSL

</div>

<div class="security-badge">

🛡 Protected Session Active

</div>

<div class="register-link">

Non hai un account?

<a href="admin/register.php">

Registrati

</a>

</div>

</div>

</div>

</body>
</html>