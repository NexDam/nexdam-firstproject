<?php require 'auth.php'; ?>

<?php

$conn = new mysqli(
    "localhost",
    "davide",
    "password",
    "mydb"
);

/* ELIMINA UTENTE */

if(isset($_GET["delete"])){

    $id = (int)$_GET["delete"];

    $stmt = $conn->prepare(
        "DELETE FROM users
        WHERE id=? AND role!='admin'"
    );

    $stmt->bind_param("i", $id);

    $stmt->execute();

}

/* PRENDI UTENTI */

$result = $conn->query(
    "SELECT * FROM users
    WHERE role!='admin'
    ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html lang="it">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Users</title>

<link rel="stylesheet" href="../css/admin.css">

<style>

.users-table{

    width:100%;

    border-collapse:collapse;

    margin-top:30px;

}

.users-table th,
.users-table td{

    padding:18px;

    border-bottom:1px solid rgba(255,255,255,0.06);

    text-align:left;

}

.users-table th{

    color:#60a5fa;

}

.delete-user{

    background:#dc2626;

    color:white;

    padding:10px 16px;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;

}

.delete-user:hover{

    background:#b91c1c;

}

.hash{

    max-width:300px;

    overflow:hidden;

    text-overflow:ellipsis;

    white-space:nowrap;

}
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
.sidebar .menu a.active{

    background:#2563eb;

    color:white;

    box-shadow:0 0 25px rgba(37,99,235,0.35);

}
</style>

</head>

<body>

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

        <a href="users.php"class="active">
           👥 Users
        </a>

        <a href="settings.php">⚙ Settings</a>

        <a href="logout.php" class="logout-btn">
        🚪 Logout
        </a>

</div>

</div>

<div class="main-content">

<h1>👥 Gestione Utenti</h1>

<table class="users-table">

<tr>

<th>ID</th>
<th>Username</th>
<th>Role</th>
<th>Password Hash</th>
<th>Action</th>

</tr>

<?php while($user = $result->fetch_assoc()): ?>

<tr>

<td>
<?php echo $user["id"]; ?>
</td>

<td>
<?php echo htmlspecialchars($user["username"]); ?>
</td>

<td>
<?php echo htmlspecialchars($user["role"]); ?>
</td>

<td class="hash">
<?php echo htmlspecialchars($user["password"]); ?>
</td>

<td>

<a
href="?delete=<?php echo $user["id"]; ?>"
class="delete-user"
onclick="return confirm(
'Eliminare utente?'
)">

🗑 Elimina

</a>

</td>

</tr>

<?php endwhile; ?>

</table>

</div>

</body>
</html>