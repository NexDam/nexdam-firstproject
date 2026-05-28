<?php

session_start();

if(!isset($_SESSION["user"])){

    header("Location: login.php");

    exit;

}

$conn = new mysqli(
    "localhost",
    "davide",
    "password",
    "mydb"
);

$userId = $_SESSION["id"];

/* ELIMINA ACCOUNT */

if(isset($_POST["delete_account"])){

    $stmt = $conn->prepare(
        "DELETE FROM users WHERE id=?"
    );

    $stmt->bind_param("i", $userId);

    $stmt->execute();

    session_destroy();

    header("Location: index.php");

    exit;

}

/* DATI UTENTE */

$stmt = $conn->prepare(
    "SELECT * FROM users WHERE id=?"
);

$stmt->bind_param("i", $userId);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Profilo</title>

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;

}

body{

    background:#0f172a;

    color:white;

    font-family:Arial,sans-serif;

    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

}

.profile-card{

    width:100%;

    max-width:700px;

    background:#1e293b;

    padding:45px;

    border-radius:24px;

    box-shadow:0 0 35px rgba(0,0,0,0.4);

}

.profile-header{

    text-align:center;

    margin-bottom:35px;

}

.avatar{

    width:100px;
    height:100px;

    background:#2563eb;

    border-radius:50%;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:40px;

    margin:auto;

    margin-bottom:20px;

}

.profile-header h1{

    color:#60a5fa;

}

.info-row{

    display:flex;

    justify-content:space-between;

    padding:18px;

    border-bottom:1px solid rgba(255,255,255,0.06);

}

.label{

    color:#94a3b8;

}

.value{

    font-weight:bold;

}

.delete-btn{

    width:100%;

    margin-top:35px;

    background:#dc2626;

    border:none;

    padding:15px;

    border-radius:12px;

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;

    transition:0.3s;

}

.delete-btn:hover{

    background:#b91c1c;

}

.back-btn{

    display:block;

    text-align:center;

    margin-top:25px;

    color:#60a5fa;

    text-decoration:none;

}

</style>

</head>

<body>

<div class="profile-card">

<div class="profile-header">

<div class="avatar">

👤

</div>

<h1>

<?php echo htmlspecialchars($user["username"]); ?>

</h1>

</div>

<div class="info-row">

<span class="label">
Username
</span>

<span class="value">

<?php echo htmlspecialchars($user["username"]); ?>

</span>

</div>

<div class="info-row">

<span class="label">
Role
</span>

<span class="value">

<?php echo htmlspecialchars($user["role"]); ?>

</span>

</div>

<div class="info-row">

<span class="label">
Password
</span>

<span class="value">

••••••••••••••••

</span>

</div>

<form method="POST">

<button
type="submit"
name="delete_account"
class="delete-btn"
onclick="return confirm(
'Sei sicuro di voler eliminare il tuo account?'
)">

🗑 Elimina Account

</button>

</form>

<a href="index.php" class="back-btn">

← Torna alla Home

</a>

</div>

</body>
</html>