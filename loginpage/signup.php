<?php
require "koneksi.php";
require "captcha.php";  

if (isset($_SESSION["user_id"])) {
    header("Location: beranda.php");
    exit;
}

$error    = "";
$username = "";
$email    = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["signup-username"]);
    $email    = trim($_POST["signup-email"]);
    $password = $_POST["signup-password"];

    if (!cekCaptcha($_POST["captcha"] ?? "")) {
      $error = "Jawaban captcha salah, coba lagi.";
      } elseif ($username === "" || $email === "" || $password === "") {
        $error = "Semua kolom wajib diisi.";
      } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
      } elseif (strlen($password) < 6) {
        $error = "Password minimal 6 karakter.";
      } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error = "Username atau email sudah terdaftar.";
        } else {
            // 3. Hash password lalu simpan
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hash);
            $stmt->execute();

            header("Location: signin.php?registered=1");
            exit;
        }
    }
}
$soal = buatCaptcha();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - SigmaMic</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_back" />
</head>
<body>

  <nav class="navbar-auth">
    <a href="../index.html" class="back-link">
      <span class="material-symbols-outlined">arrow_back</span>
      Back To Main Menu
    </a>
  </nav>

  <main>
    <div class="auth-wrapper">
      <div class="auth-card">

        <h1>Join SigmaMic!</h1>
        <p class="subtitle">input all this form to <strong>Sign Up</strong></p>

        <?php if ($error): ?>
          <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="signup.php">
          <div class="form-group">
            <label for="signup-username">Username</label>
            <input type="text" id="signup-username" name="signup-username" placeholder="Choose a username"
                  value="<?= htmlspecialchars($username) ?>" maxlength="30" required>
          </div>

          <div class="form-group">
            <label for="signup-email">Email</label>
            <input type="email" id="signup-email" name="signup-email" placeholder="Enter your email"
                  value="<?= htmlspecialchars($email) ?>" required>
          </div>

          <div class="form-group">
            <label for="signup-password">Password</label>
            <input type="password" id="signup-password" name="signup-password" placeholder="Create a password" required>
          </div>

          <div class="form-group">
            <label for="captcha">Berapa <?= $soal ?> ?</label>
            <input type="text" id="captcha" name="captcha" placeholder="Jawaban kamu" autocomplete="off" required>
          </div>

          <button type="submit" class="auth-submit">Sign Up</button>
        </form>

        <hr class="auth-divider">

        <p class="auth-footer">
          Already have an account? <a href="signin.php">Sign In</a>
        </p>

      </div>
    </div>
  </main>

</body>
</html>
