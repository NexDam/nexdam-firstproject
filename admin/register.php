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
$success = "";

/* CONTROLLO CONNESSIONE */

if($conn->connect_error){

    die("Errore connessione database");

}

/* REGISTER */

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_POST["username"]);

    $password = $_POST["password"];

    /* VALIDAZIONE */

    if(strlen($username) < 3){

        $error =
        "Username troppo corto";

    } elseif(strlen($password) < 8){

        $error =
        "Password minimo 8 caratteri";

    } else {

        /* CONTROLLA USERNAME */

        $check = $conn->prepare(
            "SELECT id
            FROM users
            WHERE username=?"
        );

        $check->bind_param(
            "s",
            $username
        );

        $check->execute();

        $result = $check->get_result();

        if($result->num_rows > 0){

            $error =
            "Username già esistente";

        } else {

            /* HASH PASSWORD */

            $hashedPassword =
            password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            /* INSERT USER */

            $stmt = $conn->prepare(
                "INSERT INTO users
                (username, password, role)
                VALUES (?, ?, 'user')"
            );

            $stmt->bind_param(
                "ss",
                $username,
                $hashedPassword
            );

            if($stmt->execute()){

                $success =
                "Registrazione completata";

            } else {

                $error =
                "Errore registrazione";

            }

        }

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

<title>Registrazione</title>

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

.register-box{

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

h1{

    text-align:center;

    margin-bottom:30px;

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

    text-align:center;

    color:#ef4444;

    font-weight:bold;

}

.success{

    margin-top:20px;

    text-align:center;

    color:#22c55e;

    font-weight:bold;

}

.login-link{

    margin-top:28px;

    text-align:center;

    color:#94a3b8;

}

.login-link a{

    color:#60a5fa;

    text-decoration:none;

    font-weight:bold;

    transition:0.3s;

}

.login-link a:hover{

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

<div class="register-box">

<h1>

📝 Registrati

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

Registrati

</button>

</form>

<div class="error">

<?php echo $error; ?>

</div>

<div class="success">

<?php echo $success; ?>

</div>

<div class="security-badge">

🛡 Secure Registration Enabled

</div>

<div class="login-link">

Hai già un account?

<a href="../login.php">

Torna al login

</a>

</div>

</div>

</body>
</html>