<?php
require "koneksi.php";
require "captcha.php";

$error = "";
$pesan = "";
$link  = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);

    if (!cekCaptcha($_POST["captcha"] ?? "")) {
        $error = "Jawaban captcha salah, coba lagi.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $hash  = hash("sha256", $token);

            $stmt = $conn->prepare("DELETE FROM password_resets WHERE user_id = ?");
            $stmt->bind_param("i", $user["id"]);
            $stmt->execute();

            $stmt = $conn->prepare("INSERT INTO password_resets (user_id, token_hash, expires_at)
                                    VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 MINUTE))");
            $stmt->bind_param("is", $user["id"], $hash);
            $stmt->execute();

            $link = "http://localhost/loginpage/reset_password.php?token=" . $token;
        }

        $pesan = "Jika email terdaftar, link reset sudah dibuat.";
    }
}
$soal = buatCaptcha();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupa Password - SigmaMic</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back" />
</head>
<body>

  <nav class="navbar-auth">
    <a href="signin.php" class="back-link">
      <span class="material-symbols-outlined">arrow_back</span>
      Back To Sign In
    </a>
  </nav>

  <main>
    <div class="auth-wrapper">
      <div class="auth-card">

        <h1>Lupa Password?</h1>

        <?php if ($error): ?>
        <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($pesan): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($pesan) ?>
            <?php if ($link): ?>
            <br><a href="<?= htmlspecialchars($link) ?>">Klik untuk reset password</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="lupa_password.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="captcha">Berapa <?= $soal ?> ?</label>
            <input type="text" id="captcha" name="captcha" autocomplete="off" required>
        </div>
        <button type="submit" class="auth-submit">Kirim Link Reset</button>
        </form>

        </div>
    </div>
  </main>

</body>
</html>