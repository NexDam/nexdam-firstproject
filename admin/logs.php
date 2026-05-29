<?php require 'auth.php'; ?>

<?php

/* APACHE LOGS */

$accessLog = shell_exec(
    "tail -n 30 /var/log/apache2/access.log 2>&1"
);

$errorLog = shell_exec(
    "tail -n 30 /var/log/apache2/error.log 2>&1"
);

$otherVhosts = shell_exec(
    "tail -n 30 /var/log/apache2/other_vhosts_access.log 2>&1"
);

/* DOCKER LOGS */

$dockerMaria = shell_exec(
    "docker logs --tail 20 mariadb 2>&1"
);

$dockerPhpMyAdmin = shell_exec(
    "docker logs --tail 20 phpmyadmin 2>&1"
);

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<meta http-equiv="Cache-Control"
content="no-cache, no-store, must-revalidate">

<meta http-equiv="Pragma"
content="no-cache">

<meta http-equiv="Expires"
content="0">



<title>Apache Logs</title>

<link rel="stylesheet" href="../css/admin.css">

<style>

.sidebar .menu .logout-btn{

    background:#dc2626;

    color:white;

    border-radius:10px;

    transition:0.3s;

}

.sidebar .menu .logout-btn:hover{

    background:#b91c1c;

    color:white;

    transform:translateY(-2px);

    box-shadow:0 0 20px rgba(220,38,38,0.4);

}
.log-box{

    background:#0f172a;

    border:1px solid rgba(255,255,255,0.06);

    border-radius:20px;

    padding:25px;

    margin-bottom:25px;

    overflow:auto;

    box-shadow:0 10px 30px rgba(0,0,0,0.35);

}

.log-box h2{

    color:#60a5fa;

    margin-bottom:20px;

}

.log-content{

    background:#020617;

    padding:20px;

    border-radius:14px;

    font-family:monospace;

    color:#e2e8f0;

    max-height:350px;

    overflow-y:auto;

    white-space:pre-wrap;

    line-height:1.6;

}

.refresh-btn{

    display:inline-block;

    background:#2563eb;

    color:white;

    padding:14px 22px;

    border-radius:12px;

    text-decoration:none;

    font-weight:bold;

    transition:0.3s;

}

.refresh-btn:hover{

    background:#1d4ed8;

    transform:translateY(-3px);

}
.sidebar .menu a.active{

    background:#2563eb;

    color:white;

    box-shadow:0 0 25px rgba(37,99,235,0.35);

}
</style>

</head>
<script>

setInterval(() => {

    location.reload();

}, 5000);

</script>
<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        🚀 WSL ADMIN

    </div>

    <div class="menu">

        <a href="index.html">
            🏠 Home
        </a>

        <a href="../index.php">
            🌐 View Website
        </a>

        <a href="dashboard.php">
            📊 Dashboard
        </a>

        <a href="system.php">
            🖥 System
        </a>

        <a href="logs.php" class="active">
            📁 Logs
        </a>
        
        <a href="users.php">
           👥 Users
        </a>
        
        <a href="settings.php">
            ⚙ Settings
        </a>

        <a href="logout.php" class="logout-btn">
            🚪 Logout
        </a>

    </div>

</div>

<!-- MAIN -->

<div class="main-content">

    <div class="topbar">

        <h1>Apache & Docker Logs</h1>

        <div class="status">

            ● LIVE

        </div>

    </div>

    <!-- ACCESS LOG -->

    <div class="log-box">

        <h2>📄 Apache Access Log</h2>

        <div class="log-content">

<?php echo htmlspecialchars($accessLog); ?>

        </div>

    </div>

    <!-- ERROR LOG -->

    <div class="log-box">

        <h2>⚠ Apache Error Log</h2>

        <div class="log-content">
<?php echo htmlspecialchars($errorLog); ?>

        </div>

    </div>

    <!-- OTHER VHOSTS LOG -->

    <div class="log-box">

        <h2>⚠ Apache Other Vhosts Log</h2>

        <div class="log-content">

<?php echo htmlspecialchars($otherVhosts); ?>

        </div>

    </div>

    <!-- MARIADB -->

    <div class="log-box">

        <h2>🗄 MariaDB Docker Log</h2>

        <div class="log-content">

<?php echo htmlspecialchars($dockerMaria); ?>

        </div>

    </div>

    <!-- PHPMYADMIN -->

    <div class="log-box">

        <h2>🧩 phpMyAdmin Docker Log</h2>

        <div class="log-content">

<?php echo htmlspecialchars($dockerPhpMyAdmin); ?>

        </div>

    </div>

    <!-- REFRESH -->

    <a href="logs.php" class="refresh-btn">

        🔄 Refresh Logs

    </a>

</div>

</body>
</html>