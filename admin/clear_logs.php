<?php

require 'auth.php';

shell_exec('sudo /usr/bin/truncate -s 0 /var/log/apache2/access.log');

shell_exec('sudo /usr/bin/truncate -s 0 /var/log/apache2/error.log');

header("Refresh:2; url=settings.php");

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<title>Clear Logs</title>

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
    color:#22c55e;
}

p{
    margin-top:20px;
    color:#cbd5e1;
}

</style>

</head>

<body>

<div class="box">

<h1>🧹 Apache Logs Cleared</h1>

<p>
I log Apache sono stati svuotati con successo.
</p>

<p>
Redirect automatico...
</p>

</div>

</body>
</html>
