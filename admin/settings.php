<?php require 'auth.php'; ?>
<?php

$user = shell_exec('whoami');

$hostname = shell_exec('hostname');

$timezone = shell_exec('timedatectl | grep "Time zone"');

$apacheVersion = shell_exec('apache2 -v | head -1');

$phpVersion = phpversion();

$serverPath = $_SERVER['DOCUMENT_ROOT'];

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Server Settings</title>

<link rel="stylesheet" href="../css/admin.css">

<style>

.setting-box{
    margin-top:15px;
    color:#f8fafc;
    line-height:1.8;
    font-family:monospace;
    white-space:pre-wrap;
}

.button-area{
    margin-top:40px;
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.action-btn{
    background:#1e293b;
    border:1px solid rgba(255,255,255,0.08);
    color:white;
    padding:14px 20px;
    border-radius:12px;
    cursor:pointer;
    transition:0.3s;
    font-weight:bold;
}

.action-btn:hover{
    background:#2563eb;
    transform:translateY(-3px);
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

        <a href="system.php">🖥 System</a>

        <a href="logs.php">📁 Logs</a>

        <a href="users.php">
           👥 Users
        </a>

        <a href="settings.php" class="active">⚙ Settings</a>

        <a href="logout.php" class="logout-btn">
        🚪 Logout
        </a>

    </div>

</div>

<!-- MAIN -->

<div class="main-content">

    <div class="topbar">

        <h1>Server Settings</h1>

        <div class="status">
            ● CONFIG
        </div>

    </div>

    <div class="cards">

        <div class="card">

            <h2>👤 Linux User</h2>

            <div class="setting-box">
                <?php echo htmlspecialchars($user); ?>
            </div>

        </div>

        <div class="card">

            <h2>🖥 Hostname</h2>

            <div class="setting-box">
                <?php echo htmlspecialchars($hostname); ?>
            </div>

        </div>

        <div class="card">

            <h2>🌍 Timezone</h2>

            <div class="setting-box">
                <?php echo htmlspecialchars($timezone); ?>
            </div>

        </div>

        <div class="card">

            <h2>🌐 Apache Version</h2>

            <div class="setting-box">
                <?php echo htmlspecialchars($apacheVersion); ?>
            </div>

        </div>

        <div class="card">

            <h2>🔥 PHP Version</h2>

            <div class="setting-box">
                PHP <?php echo $phpVersion; ?>
            </div>

        </div>

        <div class="card">

            <h2>📂 Server Path</h2>

            <div class="setting-box">
                <?php echo htmlspecialchars($serverPath); ?>
            </div>

        </div>

    </div>

    <!-- ACTION BUTTONS -->

    <div class="button-area">

        <a href="restart_apache.php">
           <button class="action-btn">
             🔄 Restart Apache
           </button>
         </a>

        <a href="clear_logs.php">

         <button class="action-btn">
           🧹 Clear Logs
         </button>

        </a>

        <a href="reload_apache.php">

          <button class="action-btn">
           ⚡ Reload Apache
          </button>

         </a>

    </div>

</div>

</body>
</html>