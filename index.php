<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WSL Server — Home</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<!-- NAVBAR -->
<nav>
    <div class="logo">🚀 WSL<span>SERVER</span></div>

    <div class="menu">
        <a href="index.php" class="active-page">Home</a>
        <a href="pages/about.php">About</a>
        <a href="pages/projects.php">Projects</a>
        <a href="pages/contact.php">Contatti</a>

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
    <div class="hero-badge">● SERVER ONLINE</div>
    <h1>Apache2 + Ubuntu WSL</h1>
    <p>
        Server Linux configurato su Windows tramite WSL2.
        Ambiente pronto per sviluppo web, hosting locale e progetti personali.
    </p>
    <div class="status">● SERVER ONLINE &nbsp;·&nbsp; TUTTI I SERVIZI ATTIVI</div>
</section>

<!-- WELCOME USER -->
<?php if(isset($_SESSION["user"])): ?>
<div class="welcome-user">
    <div class="welcome-card">
        <div class="welcome-avatar">👋</div>
        <h1>Benvenuto, <?php echo htmlspecialchars($_SESSION["user"]); ?>!</h1>
        <p>Accesso effettuato come <strong><?php echo htmlspecialchars($_SESSION["role"]); ?></strong></p>
    </div>
</div>
<?php endif; ?>

<!-- CARDS -->
<div class="section-title" style="margin-top:60px;">
    <h2>I Servizi del Server</h2>
    <p>Stack tecnologico attivo e configurato</p>
</div>

<section class="cards">
    <div class="card">
        <span class="card-icon">🖥</span>
        <h2>Sistema</h2>
        <p>Ubuntu Linux su Windows WSL2 — ambiente Linux nativo integrato direttamente in Windows.</p>
    </div>
    <div class="card">
        <span class="card-icon">🌐</span>
        <h2>Apache2</h2>
        <p>Web server attivo e configurato con virtual host, mod_rewrite e supporto PHP completo.</p>
    </div>
    <div class="card">
        <span class="card-icon">⚡</span>
        <h2>Sviluppo</h2>
        <p>Stack completo HTML, CSS, JavaScript, PHP e database MariaDB per backend locale.</p>
    </div>
    <div class="card">
        <span class="card-icon">🔒</span>
        <h2>Sicurezza</h2>
        <p>Login utenti con sessioni PHP, autenticazione database, rate limit e protezione admin.</p>
    </div>
    <div class="card">
        <span class="card-icon">🐳</span>
        <h2>Docker</h2>
        <p>Container MariaDB e phpMyAdmin gestiti tramite Docker per database isolato e portabile.</p>
    </div>
    <div class="card">
        <span class="card-icon">📊</span>
        <h2>Monitoraggio</h2>
        <p>Dashboard live con CPU, RAM, uptime, log Apache e stato container in tempo reale.</p>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="footer-top">Apache2 · PHP · MariaDB · Docker · Ubuntu WSL · 2025</div>
    <div class="footer-nexdam">Creato da <a href="https://www.nexdam.it/home.html" target="_blank" rel="noopener">Nexdam</a></div>
</footer>

</body>
</html>
