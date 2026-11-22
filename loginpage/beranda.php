<?php
require "koneksi.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: signin.php");
    exit;
}

$stmt = $conn->prepare("SELECT username, email, created_at FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    session_destroy();
    header("Location: signin.php");
    exit;
}

$total = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()["total"];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SigmaMic</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <nav class="navbar-auth navbar-home">
        <strong>SigmaMic</strong>
        <div class="nav-right">
        <span><?= htmlspecialchars($user["username"]) ?></span>
        <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </nav>

    <main class="home">
        <h1>Halo, <?= htmlspecialchars($user["username"]) ?>! 👋</h1>
        <p class="subtitle">Kamu berhasil masuk ke SigmaMic.</p>

        <div class="home-cards">
        <div class="home-card">
            <span class="home-label">Email</span>
            <strong><?= htmlspecialchars($user["email"]) ?></strong>
        </div>
        <div class="home-card">
            <span class="home-label">Bergabung sejak</span>
            <strong><?= date("d M Y", strtotime($user["created_at"])) ?></strong>
        </div>
        <div class="home-card">
            <span class="home-label">Total member</span>
            <strong><?= (int)$total ?> orang</strong>
        </div>
        </div>
    </main>

</body>
</html>
