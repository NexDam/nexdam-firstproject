<?php

session_start();

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>WSL Server</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<!-- NAVBAR -->

<nav>

    <div class="logo">

        🚀 WSL SERVER

    </div>

    <div class="menu">

        <a href="index.php">Home</a>

        <a href="pages/about.html">About</a>

        <a href="pages/projects.html">Projects</a>

        <a href="pages/contact.html">Contatti</a>

        <!-- ADMIN PANEL SOLO ADMIN -->

        <?php if(
            isset($_SESSION["role"]) &&
            $_SESSION["role"] == "admin"
        ): ?>

            <a href="/admin/index.html" class="admin-btn">

                🔐 Admin Panel

            </a>

        <?php endif; ?>
        <?php if(isset($_SESSION["user"])): ?>

         <a href="/profile.php" class="profile-btn">
            👤 Profilo
         </a>

        <?php endif; ?>
        <!-- LOGIN / LOGOUT -->

        <?php if(isset($_SESSION["user"])): ?>

            <a href="/admin/logout.php" class="logout-btn">

                🚪 Logout

            </a>

        <?php else: ?>

            <a href="/login.php" class="login-btn">

                🔑 Login

            </a>

        <?php endif; ?>

    </div>

</nav>

<!-- HERO -->

<section class="hero">

    <h1>

        Apache2 + Ubuntu WSL

    </h1>

    <p>

        Server Linux configurato su Windows tramite WSL.
        Ambiente pronto per sviluppo web, hosting locale
        e progetti personali.

    </p>

    <div class="status">

        ● SERVER ONLINE

    </div>

</section>

<!-- BIG WELCOME USER -->

<?php if(isset($_SESSION["user"])): ?>

<div class="welcome-user">

    <div class="welcome-card">

        <div class="welcome-avatar">

            👋

        </div>

        <h1>

            Benvenuto,
            <?php echo htmlspecialchars($_SESSION["user"]); ?>

        </h1>

        <p>

            Accesso effettuato come

            <strong>

                <?php echo htmlspecialchars($_SESSION["role"]); ?>

            </strong>

        </p>

    </div>

</div>

<?php endif; ?>

<!-- CARDS -->

<section class="cards">

    <div class="card">

        <h2>🖥 Sistema</h2>

        <p>

            Ubuntu Linux su Windows WSL

        </p>

    </div>

    <div class="card">

        <h2>🌐 Apache2</h2>

        <p>

            Web server attivo e funzionante correttamente

        </p>

    </div>

    <div class="card">

        <h2>⚡ Sviluppo</h2>

        <p>

            HTML, CSS, JavaScript, PHP e backend locale

        </p>

    </div>

    <div class="card">

        <h2>🔒 Sicurezza</h2>

        <p>

            Login utenti con sessioni PHP e autenticazione database

        </p>

    </div>

</section>

<!-- FOOTER -->

<footer>

    Creato con Ubuntu + Apache2 + PHP + MariaDB + WSL 🚀

</footer>

</body>

</html>