<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About — WSL Server</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<!-- NAVBAR -->
<nav>
    <div class="logo">🚀 WSL<span>SERVER</span></div>

    <div class="menu">
        <a href="../index.php">Home</a>
        <a href="about.php" class="active-page">About</a>
        <a href="projects.php">Projects</a>
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
    <div class="hero-badge">Chi siamo</div>
    <h1>About</h1>
    <p>
        Un ambiente di sviluppo Linux moderno costruito su Windows tramite WSL2,
        con Apache2, PHP, MariaDB e Docker — tutto configurato da zero.
    </p>
</section>

<!-- INTRO -->
<div class="content-section">
    <div class="section-title" style="text-align:left; margin-bottom:30px;">
        <h2 style="font-size:1.8rem;">🎯 Il Progetto</h2>
    </div>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(280px,1fr)); gap:24px;">
        <div class="card">
            <span class="card-icon">🧠</span>
            <h2>Obiettivo</h2>
            <p>Creare un server di sviluppo locale completo e professionale direttamente su Windows, sfruttando la potenza di Linux tramite WSL2 senza dual boot.</p>
        </div>
        <div class="card">
            <span class="card-icon">⚙️</span>
            <h2>Approccio</h2>
            <p>Stack LAMP moderno: Linux (Ubuntu WSL2), Apache2, MariaDB in Docker, PHP con sessioni sicure e admin panel custom sviluppato da zero.</p>
        </div>
        <div class="card">
            <span class="card-icon">🚀</span>
            <h2>Risultato</h2>
            <p>Ambiente stabile per sviluppo web, test di backend PHP, gestione database e deployment locale con monitoraggio in tempo reale.</p>
        </div>
    </div>
</div>

<!-- STACK -->
<div class="content-section">
    <h2>🛠 Stack Tecnologico</h2>
    <div class="skill-grid">
        <div class="skill-item">
            <span class="skill-icon">🐧</span>
            <span>Ubuntu WSL2</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🌐</span>
            <span>Apache2</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🔥</span>
            <span>PHP 8.x</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🗄</span>
            <span>MariaDB</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🐳</span>
            <span>Docker</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🧩</span>
            <span>phpMyAdmin</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🎨</span>
            <span>HTML / CSS</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">⚡</span>
            <span>JavaScript</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🔒</span>
            <span>Auth PHP</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">📊</span>
            <span>Dashboard Live</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">📁</span>
            <span>Apache Logs</span>
        </div>
        <div class="skill-item">
            <span class="skill-icon">🛡</span>
            <span>Sessioni Sicure</span>
        </div>
    </div>
</div>

<!-- CARATTERISTICHE -->
<div class="content-section">
    <h2>✨ Caratteristiche Principali</h2>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px,1fr)); gap:20px; margin-top:20px;">

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:24px; display:flex; gap:16px; align-items:flex-start;">
            <span style="font-size:1.8rem; flex-shrink:0;">🔐</span>
            <div>
                <strong style="color:#60a5fa; display:block; margin-bottom:6px;">Autenticazione Sicura</strong>
                <span style="color:#94a3b8; font-size:0.9rem;">Login con sessioni PHP, password hash bcrypt, rate limiting e protezione CSRF.</span>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:24px; display:flex; gap:16px; align-items:flex-start;">
            <span style="font-size:1.8rem; flex-shrink:0;">📊</span>
            <div>
                <strong style="color:#60a5fa; display:block; margin-bottom:6px;">Dashboard in Tempo Reale</strong>
                <span style="color:#94a3b8; font-size:0.9rem;">Monitoraggio CPU, RAM, uptime, stato Apache e Docker con aggiornamento automatico.</span>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:24px; display:flex; gap:16px; align-items:flex-start;">
            <span style="font-size:1.8rem; flex-shrink:0;">👥</span>
            <div>
                <strong style="color:#60a5fa; display:block; margin-bottom:6px;">Gestione Utenti</strong>
                <span style="color:#94a3b8; font-size:0.9rem;">Pannello admin per visualizzare, aggiungere ed eliminare utenti direttamente dal browser.</span>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:24px; display:flex; gap:16px; align-items:flex-start;">
            <span style="font-size:1.8rem; flex-shrink:0;">📁</span>
            <div>
                <strong style="color:#60a5fa; display:block; margin-bottom:6px;">Visualizzazione Log</strong>
                <span style="color:#94a3b8; font-size:0.9rem;">Log Apache e Docker visibili in tempo reale dal pannello admin con refresh automatico.</span>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:24px; display:flex; gap:16px; align-items:flex-start;">
            <span style="font-size:1.8rem; flex-shrink:0;">🔄</span>
            <div>
                <strong style="color:#60a5fa; display:block; margin-bottom:6px;">Controllo Apache</strong>
                <span style="color:#94a3b8; font-size:0.9rem;">Restart e reload di Apache2 direttamente dal browser, senza accedere al terminale.</span>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(255,255,255,0.06); border-radius:16px; padding:24px; display:flex; gap:16px; align-items:flex-start;">
            <span style="font-size:1.8rem; flex-shrink:0;">📱</span>
            <div>
                <strong style="color:#60a5fa; display:block; margin-bottom:6px;">Design Responsive</strong>
                <span style="color:#94a3b8; font-size:0.9rem;">Interfaccia completamente responsive, ottimizzata per desktop, tablet e smartphone.</span>
            </div>
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
