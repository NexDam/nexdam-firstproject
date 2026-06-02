<?php

require 'auth.php';

shell_exec('sudo /usr/sbin/service apache2 restart > /dev/null 2>&1 &');

header("Refresh:3; url=settings.php");

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<title>Restarting Apache</title>

<style>

body{
    background:#0b1220;
    color:white;
    font-family:Arial;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.box{
    background:#1e293b;
    padding:40px;
    border-radius:20px;
    text-align:center;
}

h1{
    color:#60a5fa;
}

p{
    margin-top:20px;
    color:#cbd5e1;
}

</style>

</head>

<body>

<div class="box">

<h1>🚀 Restarting Apache...</h1>

<p>
Attendi qualche secondo...
</p>

<p>
Redirect automatico alle impostazioni.
</p>

</div>

</body>
</html>