<?php require 'auth.php'; ?>

<?php

/* SYSTEM INFO */

$uptime = shell_exec('uptime');

$memory = shell_exec("free -h | grep Mem");

$disk = shell_exec("df -h / | tail -1");

$hostname = shell_exec("hostname");

$cpuRaw = shell_exec("top -bn1 | grep 'Cpu(s)'");

/* CPU PERCENT */

preg_match('/(\d+\.\d+)\s*id/', $cpuRaw, $matches);

$idle = isset($matches[1]) ? (float)$matches[1] : 0;

$cpuUsage = round(100 - $idle);

/* RAM PERCENT */

$memData = shell_exec("free | grep Mem");

$memParts = preg_split('/\s+/', trim($memData));

$totalMem = $memParts[1];

$usedMem = $memParts[2];

$ramUsage = round(($usedMem / $totalMem) * 100);

/* APACHE STATUS */

$apache = trim(shell_exec("systemctl is-active apache2"));

/* DOCKER STATUS */

$docker = trim(shell_exec("systemctl is-active docker"));

/* MARIADB CONTAINER */

$mariadb = trim(shell_exec(
    "docker ps -a --filter 'name=mariadb' --format '{{.Status}}'"
));

/* PHPMYADMIN CONTAINER */

$phpmyadmin = trim(shell_exec(
    "docker ps -a --filter 'name=phpmyadmin' --format '{{.Status}}'"
));

$output = "";

if(isset($_POST["command"])){

    $command = $_POST["command"];

    $allowed = [
        "uptime",
        "free -h",
        "df -h",
        "docker ps",
        "whoami",
        "hostname"
    ];

    if(in_array($command, $allowed)){

        $output = shell_exec($command . " 2>&1");

    } else {

        $output = "Comando non permesso";

    }

}
?>
<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Live Dashboard</title>

<link rel="stylesheet" href="../css/admin.css">

<style>

.system-info{

    margin-top:15px;

    color:#e2e8f0;

    line-height:1.7;

    font-size:1rem;

}

.system-info pre{

    white-space:pre-wrap;

    font-family:monospace;

    color:#f8fafc;

}

/* GRID */

.cards{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));

    gap:25px;

}

/* PREMIUM SIDEBAR */

.sidebar .menu a{

    position:relative;

    transition:0.3s;

    border-radius:14px;

}

.sidebar .menu a:hover{

    background:rgba(37,99,235,0.15);

    transform:translateX(5px);

    box-shadow:0 0 20px rgba(37,99,235,0.15);

}

/* ACTIVE LINK */

.sidebar .menu a.active{

    background:#2563eb;

    color:white;

    box-shadow:0 0 25px rgba(37,99,235,0.35);

}

/* STATUS */

.online{

    color:#22c55e;

    font-weight:bold;

}

.offline{

    color:#ef4444;

    font-weight:bold;

}

/* PROGRESS BAR */

.progress-box{

    margin-top:20px;

}

.progress-label{

    display:flex;

    justify-content:space-between;

    margin-bottom:10px;

    color:#cbd5e1;

}

.progress{

    width:100%;

    height:16px;

    background:#0f172a;

    border-radius:999px;

    overflow:hidden;

}

.progress-fill{

    height:100%;

    border-radius:999px;

    background:linear-gradient(
        90deg,
        #2563eb,
        #7c3aed
    );

    box-shadow:0 0 20px rgba(37,99,235,0.45);

}

/* CONTAINER STATUS */

.container-status{

    margin-top:20px;

    font-size:1.1rem;

    font-weight:bold;

}

.running{

    color:#22c55e;

}

.exited{

    color:#ef4444;

}
.logout-btn{

    background:#dc2626;

    margin-top:25px;

}

.logout-btn:hover{

    background:#b91c1c;

}
.terminal{

    margin-top:35px;

    background:#020617;

    color:#22c55e;

    padding:30px;

    border-radius:20px;

    font-family:monospace;

    box-shadow:0 10px 30px rgba(0,0,0,0.4);

    overflow:auto;

    border:1px solid rgba(34,197,94,0.15);

}

.terminal pre{

    white-space:pre-wrap;

    line-height:1.8;

    font-size:15px;

}
.terminal-input{

    width:100%;

    background:#000;

    color:#22c55e;

    border:none;

    padding:14px;

    font-family:monospace;

    font-size:15px;

    outline:none;

    margin-bottom:20px;

    border-radius:10px;

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

        <a href="index.html">
            🏠 Home
        </a>

        <a href="../index.php">
            🌐 View Website
        </a>

        <a href="dashboard.php" class="active">
            📊 Dashboard
        </a>

        <a href="system.php">
            🖥 System
        </a>

        <a href="logs.php">
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

        <h1>Live Dashboard</h1>

        <div class="status">
            ● ONLINE
        </div>

    </div>

    <!-- STATUS CARDS -->

    <div class="cards">

        <!-- APACHE -->

        <div class="card">

            <h2>🌐 Apache2</h2>

            <div class="container-status">

                <?php if($apache == "active"): ?>

                    <span class="running">
                        ● ONLINE
                    </span>

                <?php else: ?>

                    <span class="exited">
                        ● OFFLINE
                    </span>

                <?php endif; ?>

            </div>

        </div>

        <!-- DOCKER -->

        <div class="card">

            <h2>🐳 Docker</h2>

            <div class="container-status">

                <?php if($docker == "active"): ?>

                    <span class="running">
                        ● ONLINE
                    </span>

                <?php else: ?>

                    <span class="exited">
                        ● OFFLINE
                    </span>

                <?php endif; ?>

            </div>

        </div>

        <!-- MARIADB -->

        <div class="card">

            <h2>🗄 MariaDB</h2>

            <div class="container-status">

                <?php if(str_contains($mariadb, "Up")): ?>

                    <span class="running">
                        ● Container Running
                    </span>

                <?php else: ?>

                    <span class="exited">
                        ● Container Exited
                    </span>

                <?php endif; ?>

            </div>

        </div>

        <!-- PHPMYADMIN -->

        <div class="card">

            <h2>🧩 phpMyAdmin</h2>

            <div class="container-status">

                <?php if(str_contains($phpmyadmin, "Up")): ?>

                    <span class="running">
                        ● Container Running
                    </span>

                <?php else: ?>

                    <span class="exited">
                        ● Container Exited
                    </span>

                <?php endif; ?>

            </div>

        </div>

        <!-- CPU -->

        <div class="card">

            <h2>⚡ CPU Usage</h2>

            <div class="progress-box">

                <div class="progress-label">

                    <span>CPU</span>

                    <span><?php echo $cpuUsage; ?>%</span>

                </div>

                <div class="progress">

                    <div class="progress-fill"
                    style="width:<?php echo $cpuUsage; ?>%"></div>

                </div>

            </div>

        </div>

        <!-- RAM -->

        <div class="card">

            <h2>🧠 RAM Usage</h2>

            <div class="progress-box">

                <div class="progress-label">

                    <span>RAM</span>

                    <span><?php echo $ramUsage; ?>%</span>

                </div>

                <div class="progress">

                    <div class="progress-fill"
                    style="width:<?php echo $ramUsage; ?>%"></div>

                </div>

            </div>

        </div>

        <!-- HOSTNAME -->

        <div class="card">

            <h2>🖥 Hostname</h2>

            <div class="system-info">

                <pre><?php echo htmlspecialchars($hostname); ?></pre>

            </div>

        </div>

        <!-- UPTIME -->

        <div class="card">

            <h2>⏱ Uptime</h2>

            <div class="system-info">

                <pre><?php echo htmlspecialchars($uptime); ?></pre>

            </div>

        </div>

    </div>
    <div class="terminal">

<form method="POST">

<input
type="text"
name="command"
placeholder="Scrivi comando Linux..."
class="terminal-input"
autocomplete="off"
>

<button type="submit" style="background:#22c55e;color:#000;border:none;padding:10px 22px;border-radius:8px;font-family:monospace;font-weight:bold;cursor:pointer;">Esegui</button>

</form>

<pre>

<?php echo htmlspecialchars($output); ?>

</pre>

</div>
</div>
</body>
</html>