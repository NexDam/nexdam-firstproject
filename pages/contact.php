<?php
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contatti — WSL Server</title>
<link rel="stylesheet" href="../style.css">
</head>

<body>

<!-- NAVBAR -->
<nav>
    <div class="logo">🚀 WSL<span>SERVER</span></div>

    <div class="menu">
        <a href="../index.php">Home</a>
        <a href="about.php">About</a>
        <a href="projects.php">Projects</a>
        <a href="contact.php" class="active-page">Contatti</a>

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
    <div class="hero-badge">Contatti</div>
    <h1>Contattaci</h1>
    <p>
        Hai domande sul server, sul progetto o vuoi collaborare?
        Trova qui tutte le informazioni per metterti in contatto.
    </p>
</section>

<!-- CONTACT CARDS -->
<div class="section-title">
    <h2>📬 Informazioni di Contatto</h2>
    <p>Tutti i canali disponibili</p>
</div>

<div class="contact-grid">

    <div class="contact-card">
        <span class="icon">📧</span>
        <h3>Email</h3>
        <p>
            <a href="mailto:admin@localhost">admin@localhost</a>
        </p>
        <p style="margin-top:8px; font-size:0.85rem; color:#475569;">Server locale di sviluppo</p>
    </div>

    <div class="contact-card">
        <span class="icon">🌐</span>
        <h3>Server</h3>
        <p>Apache2 + Ubuntu WSL2</p>
        <p style="margin-top:8px;">
            <span style="background:rgba(34,197,94,0.15); color:#22c55e; padding:4px 10px; border-radius:6px; font-size:0.8rem; font-weight:600;">● Online</span>
        </p>
    </div>

    <div class="contact-card">
        <span class="icon">🖥</span>
        <h3>Ambiente</h3>
        <p>Windows + WSL2</p>
        <p style="margin-top:8px; font-size:0.85rem; color:#475569;">Linux nativo su Windows</p>
    </div>

    <div class="contact-card">
        <span class="icon">🔒</span>
        <h3>Admin Panel</h3>
        <p>
            <a href="/admin/index.html">Accedi al pannello</a>
        </p>
        <p style="margin-top:8px; font-size:0.85rem; color:#475569;">Solo utenti autorizzati</p>
    </div>

</div>

<!-- NEXDAM SECTION -->
<div class="nexdam-banner">
    <div class="section-title" style="margin-bottom:24px;">
        <h2>👨‍💻 Sviluppato da</h2>
    </div>
    <div class="nexdam-card">
        <div class="nexdam-logo">🏢</div>
        <div class="nexdam-text">
            <h3>Nexdam</h3>
            <p>
                Questo server e tutti i suoi componenti — admin panel, sistema di autenticazione,
                dashboard live, gestione log e interfaccia frontend — sono stati progettati e
                sviluppati da <strong style="color:#60a5fa;">Nexdam</strong>.
                Visita il sito ufficiale per scoprire altri progetti e servizi.
            </p>
            <a href="https://www.nexdam.it/home.html" target="_blank" rel="noopener" class="nexdam-link">
                🌐 Visita Nexdam.it
            </a>
        </div>
    </div>
</div>

<!-- SERVER STATUS -->
<div class="content-section">
    <h2>⚡ Stato del Server</h2>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px,1fr)); gap:18px; margin-top:20px;">

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(34,197,94,0.15); border-radius:16px; padding:22px; display:flex; align-items:center; gap:16px;">
            <span style="font-size:1.6rem;">🌐</span>
            <div>
                <div style="color:#f1f5f9; font-weight:700; font-size:0.95rem;">Apache2</div>
                <div style="color:#22c55e; font-size:0.85rem; font-weight:600;">● Online</div>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(34,197,94,0.15); border-radius:16px; padding:22px; display:flex; align-items:center; gap:16px;">
            <span style="font-size:1.6rem;">🗄</span>
            <div>
                <div style="color:#f1f5f9; font-weight:700; font-size:0.95rem;">MariaDB</div>
                <div style="color:#22c55e; font-size:0.85rem; font-weight:600;">● Online</div>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(34,197,94,0.15); border-radius:16px; padding:22px; display:flex; align-items:center; gap:16px;">
            <span style="font-size:1.6rem;">🐳</span>
            <div>
                <div style="color:#f1f5f9; font-weight:700; font-size:0.95rem;">Docker</div>
                <div style="color:#22c55e; font-size:0.85rem; font-weight:600;">● Online</div>
            </div>
        </div>

        <div style="background:rgba(15,23,42,0.7); border:1px solid rgba(34,197,94,0.15); border-radius:16px; padding:22px; display:flex; align-items:center; gap:16px;">
            <span style="font-size:1.6rem;">🔥</span>
            <div>
                <div style="color:#f1f5f9; font-weight:700; font-size:0.95rem;">PHP 8.x</div>
                <div style="color:#22c55e; font-size:0.85rem; font-weight:600;">● Attivo</div>
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
