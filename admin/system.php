<?php require 'auth.php'; ?>
<?php

$hostname = shell_exec('hostname');

$kernel = shell_exec('uname -r');

$os = shell_exec('uname -o');

$php = phpversion();

$apache = shell_exec('systemctl is-active apache2');

$cpu = shell_exec("lscpu | grep 'Model name'");

$memory = shell_exec("free -h | grep Mem");

$disk = shell_exec("df -h / | tail -1");

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>System Information</title>

<link rel="stylesheet" href="../css/admin.css">

<style>

.info{
    margin-top:15px;
    color:#f1f5f9;
    line-height:1.8;
    font-family:monospace;
    white-space:pre-wrap;
}
.logout-btn{

    background:#dc2626;

    margin-top:25px;

}

.logout-btn:hover{

    background:#b91c1c;

}
.sidebar .menu a.active{

    background:#2563eb;

    color:white;

    box-shadow:0 0 25px rgba(37,99,235,0.35);

}
</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">
        🚀 WSL ADMIN
    </div>

    <div class="menu">

        <a href="index.html">🏠 Home</a>

        <a href="../index.php">🌐 View Website</a>

        <a href="dashboard.php">📊 Dashboard</a>

        <a href="system.php" class="active">🖥 System</a>

        <a href="logs.php">📁 Logs</a>

        <a href="settings.php">⚙ Settings</a>

        <a href="users.php">
           👥 Users
        </a>

        <a href="logout.php" class="logout-btn">
        🚪 Logout
        </a>

    </div>

</div>

<!-- MAIN -->

<div class="main-content">

    <div class="topbar">

        <h1>System Information</h1>

        <div class="status">
            ● ACTIVE
        </div>

    </div>

    <div class="cards">

        <div class="card">

            <h2>🖥 Hostname</h2>

            <div class="info">
                <?php echo htmlspecialchars($hostname); ?>
            </div>

        </div>

        <div class="card">

            <h2>🐧 Linux Kernel</h2>

            <div class="info">
                <?php echo htmlspecialchars($kernel); ?>
            </div>

        </div>

        <div class="card">

            <h2>⚙ Operating System</h2>

            <div class="info">
                <?php echo htmlspecialchars($os); ?>
            </div>

        </div>

        <div class="card">

            <h2>🔥 PHP Version</h2>

            <div class="info">
                PHP <?php echo $php; ?>
            </div>

        </div>

        <div class="card">

            <h2>🌐 Apache Status</h2>

            <div class="info">
                <?php echo htmlspecialchars($apache); ?>
            </div>

        </div>

        <div class="card">

            <h2>🧠 Memory</h2>

            <div class="info">
                <?php echo htmlspecialchars($memory); ?>
            </div>

        </div>

        <div class="card">

            <h2>💾 Disk</h2>

            <div class="info">
                <?php echo htmlspecialchars($disk); ?>
            </div>

        </div>

        <div class="card">

            <h2>⚡ CPU</h2>

            <div class="info">
                <?php echo htmlspecialchars($cpu); ?>
            </div>

        </div>

    </div>

</div>

</body>
</html>