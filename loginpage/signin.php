<?php
require "koneksi.php";

if (isset($_SESSION["user_id"])) {
    header("Location: beranda.php");
    exit;
}

$error = "";
$login = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $login    = trim($_POST["login-id"]);
    $password = $_POST["login-password"];

    if ($login === "" || $password === "") {
        $error = "Isi email/username dan password.";
    } else {
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $login, $login);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        // password_verify membandingkan password asli dengan hash di database
        if ($user && password_verify($password, $user["password"])) {
            session_regenerate_id(true);           // keamanan: ganti ID sesi
            $_SESSION["user_id"]  = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: beranda.php");
            exit;
        } else {
            // pesan sengaja dibuat umum, biar orang tidak bisa menebak akun mana yang ada
            $error = "Email/username atau password salah.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In - SigmaMic</title>
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

        <h1>Welcome Back!</h1>
        <p class="subtitle">input all this form to <strong>Sign In</strong></p>

        <?php if (isset($_GET["registered"])): ?>
          <div class="alert alert-success">Akun berhasil dibuat, silakan Sign In.</div>
        <?php endif; ?>

        <?php if ($error): ?>
          <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="signin.php">
          <div class="form-group">
            <label for="login-id">Email / Username</label>
            <input type="text" id="login-id" name="login-id" placeholder="Enter your email or username"
                  value="<?= htmlspecialchars($login) ?>" required>
          </div>

          <div class="form-group">
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="login-password" placeholder="Enter your password" required>
          </div>

          <button type="submit" class="auth-submit">Sign In</button>
        </form>

        <hr class="auth-divider">

        <p class="auth-footer">
          New to SigmaMic? <a href="signup.php">Sign Up</a>
        </p>

      </div>
    </div>
  </main>

</body>
</html>
