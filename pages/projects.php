<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Projects — WSL Server</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<!-- NAVBAR -->
<nav>
    <div class="logo">🚀 WSL<span>SERVER</span></div>

    <div class="menu">
        <a href="../index.php">Home</a>
        <a href="about.php">About</a>
        <a href="projects.php" class="active-page">Projects</a>
        <a href="contact.php">Contatti</a>

        <?php if(isset($_SESSION["role"]) && $_SESSION["role"] == "admin"): ?>
            <a href="/admin/index.html" class="admin-btn">🔐 Admin Panel</a>
        <?php endif; ?>

        <?php if(isset($_SESSION["user"])): ?>
            <a href="/profile.php" class="profile-btn">👤 Profilo</a>
            <a href="/admin/logout.php" class="logout-btn">🚪 Logout</a>
        <?php else: ?>
            <a href="/login.php" class="login-btn">🔑 Login</a>
        <?php endif; ?>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-badge">Portfolio</div>
    <h1>Projects</h1>
    <p>
        I progetti e servizi sviluppati e configurati su questo server WSL —
        dal pannello admin alla gestione dei container Docker.
    </p>
</section>

<!-- PROJECTS PRINCIPALI -->
<div class="section-title">
    <h2>🚀 Progetti Principali</h2>
    <p>Sistemi attivi sul server</p>
</div>

<section class="cards">

    <div class="card">
        <span class="card-icon">🔒</span>
        <h2>Admin Panel</h2>
        <p>Pannello di controllo completo protetto da autenticazione PHP. Dashboard live, gestione utenti, log viewer e controllo Apache.</p>
        <div style="margin-top:16px;">
            <span style="background:rgba(34,197,94,0.15); color:#22c55e; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">● ATTIVO</span>
        </div>
    </div>

    <div class="card">
        <span class="card-icon">📊</span>
        <h2>Live Dashboard</h2>
        <p>Monitoraggio in tempo reale di CPU, RAM, uptime del sistema, stato Apache2, Docker e container MariaDB/phpMyAdmin.</p>
        <div style="margin-top:16px;">
            <span style="background:rgba(34,197,94,0.15); color:#22c55e; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">● ATTIVO</span>
        </div>
    </div>

    <div class="card">
        <span class="card-icon">👥</span>
        <h2>User Management</h2>
        <p>Sistema di registrazione e login utenti con ruoli (admin/user), password hash bcrypt, sessioni sicure e rate limiting.</p>
        <div style="margin-top:16px;">
            <span style="background:rgba(34,197,94,0.15); color:#22c55e; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">● ATTIVO</span>
        </div>
    </div>

    <div class="card">
        <span class="card-icon">📁</span>
        <h2>Log Viewer</h2>
        <p>Visualizzazione in tempo reale dei log Apache2 (access, error, vhosts) e dei container Docker con auto-refresh ogni 5 secondi.</p>
        <div style="margin-top:16px;">
            <span style="background:rgba(34,197,94,0.15); color:#22c55e; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">● ATTIVO</span>
        </div>
    </div>

    <div class="card">
        <span class="card-icon">🔄</span>
        <h2>Apache Control</h2>
        <p>Restart e reload di Apache2 direttamente dal browser tramite il pannello admin, senza bisogno di accedere al terminale.</p>
        <div style="margin-top:16px;">
            <span style="background:rgba(34,197,94,0.15); color:#22c55e; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">● ATTIVO</span>
        </div>
    </div>

    <div class="card">
        <span class="card-icon">🐳</span>
        <h2>Docker Stack</h2>
        <p>Container MariaDB e phpMyAdmin gestiti con Docker. Database isolato e portabile con interfaccia web per la gestione.</p>
        <div style="margin-top:16px;">
            <span style="background:rgba(34,197,94,0.15); color:#22c55e; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">● ATTIVO</span>
        </div>
    </div>

</section>

<!-- TECH DETAILS -->
<div class="content-section">
    <h2>⚙️ Dettagli Tecnici</h2>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px,1fr)); gap:20px; margin-top:20px;">

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:26px;">
            <h3 style="color:#60a5fa; margin-bottom:16px; font-size:1rem;">🌐 Web Server</h3>
            <ul style="color:#94a3b8; font-size:0.9rem; line-height:2; padding-left:18px;">
                <li>Apache2 con mod_rewrite attivo</li>
                <li>Virtual host configurati manualmente</li>
                <li>HTTPS-ready (certificato self-signed)</li>
                <li>.htaccess personalizzati</li>
            </ul>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:26px;">
            <h3 style="color:#60a5fa; margin-bottom:16px; font-size:1rem;">🔥 Backend PHP</h3>
            <ul style="color:#94a3b8; font-size:0.9rem; line-height:2; padding-left:18px;">
                <li>PHP 8.x con sessioni sicure</li>
                <li>Prepared statements anti SQL injection</li>
                <li>Password hash con bcrypt</li>
                <li>Rate limiting su login</li>
            </ul>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:26px;">
            <h3 style="color:#60a5fa; margin-bottom:16px; font-size:1rem;">🗄 Database</h3>
            <ul style="color:#94a3b8; font-size:0.9rem; line-height:2; padding-left:18px;">
                <li>MariaDB in container Docker</li>
                <li>phpMyAdmin per gestione visuale</li>
                <li>Backup SQL automatico</li>
                <li>Utenti con ruoli differenziati</li>
            </ul>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:26px;">
            <h3 style="color:#60a5fa; margin-bottom:16px; font-size:1rem;">🐧 Sistema</h3>
            <ul style="color:#94a3b8; font-size:0.9rem; line-height:2; padding-left:18px;">
                <li>Ubuntu 22.04 su WSL2</li>
                <li>Kernel Linux nativo</li>
                <li>systemd per gestione servizi</li>
                <li>Integrazione completa con Windows</li>
            </ul>
        </div>

    </div>
</div>

<!-- STATS -->
<div class="content-section">
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); gap:20px;">

        <div style="background:linear-gradient(135deg,rgba(37,99,235,0.15),rgba(37,99,235,0.05)); border:1px solid rgba(37,99,235,0.2); border-radius:18px; padding:28px; text-align:center;">
            <div style="font-size:2.5rem; font-weight:900; color:#60a5fa; margin-bottom:8px;">6</div>
            <div style="color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Progetti Attivi</div>
        </div>

        <div style="background:linear-gradient(135deg,rgba(124,58,237,0.15),rgba(124,58,237,0.05)); border:1px solid rgba(124,58,237,0.2); border-radius:18px; padding:28px; text-align:center;">
            <div style="font-size:2.5rem; font-weight:900; color:#a78bfa; margin-bottom:8px;">8+</div>
            <div style="color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Tecnologie</div>
        </div>

        <div style="background:linear-gradient(135deg,rgba(34,197,94,0.15),rgba(34,197,94,0.05)); border:1px solid rgba(34,197,94,0.2); border-radius:18px; padding:28px; text-align:center;">
            <div style="font-size:2.5rem; font-weight:900; color:#22c55e; margin-bottom:8px;">24/7</div>
            <div style="color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Server Online</div>
        </div>

        <div style="background:linear-gradient(135deg,rgba(245,158,11,0.15),rgba(245,158,11,0.05)); border:1px solid rgba(245,158,11,0.2); border-radius:18px; padding:28px; text-align:center;">
            <div style="font-size:2.5rem; font-weight:900; color:#fbbf24; margin-bottom:8px;">100%</div>
            <div style="color:#64748b; font-size:0.85rem; font-weight:600; text-transform:uppercase; letter-spacing:1px;">Custom Build</div>
        </div>

    </div>
</div>

<!-- FOOTER -->
<footer>
    <div class="footer-top">Apache2 · PHP · MariaDB · Docker · Ubuntu WSL · 2025</div>
    <div class="footer-nexdam">Creato da <a href="https://www.nexdam.it/home.html" target="_blank" rel="noopener">Nexdam</a></div>
</footer>

</body>
</html>
