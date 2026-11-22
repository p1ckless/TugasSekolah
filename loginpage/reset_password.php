<?php
require "koneksi.php";

$token = $_GET["token"] ?? $_POST["token"] ?? "";
$hash  = hash("sha256", $token);
$error = "";

$stmt = $conn->prepare("SELECT user_id FROM password_resets WHERE token_hash = ? AND expires_at > NOW()");
$stmt->bind_param("s", $hash);
$stmt->execute();
$reset = $stmt->get_result()->fetch_assoc();

if ($reset && $_SERVER["REQUEST_METHOD"] === "POST") {
    $password   = $_POST["password"];
    $konfirmasi = $_POST["konfirmasi"];

    if (strlen($password) < 6) {
        $error = "Password minimal 6 karakter.";
    } elseif ($password !== $konfirmasi) {
        $error = "Konfirmasi password tidak sama.";
    } else {
        $baru = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $baru, $reset["user_id"]);
        $stmt->execute();

        $stmt = $conn->prepare("DELETE FROM password_resets WHERE user_id = ?");
        $stmt->bind_param("i", $reset["user_id"]);
        $stmt->execute();

        header("Location: signin.php?reset=1");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - SigmaMic</title>
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

            <?php if (!$reset): ?>
            <h1>Link Tidak Valid</h1>
            <p class="subtitle">Link reset salah atau sudah kadaluarsa.</p>
            <p class="auth-footer"><a href="lupa_password.php">Minta link baru</a></p>

            <?php else: ?>
            <h1>Password Baru</h1>
            <p class="subtitle">buat password baru untuk akunmu</p>

            <?php if ($error): ?>
                <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST" action="reset_password.php">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" id="password" name="password" placeholder="Minimal 6 karakter" required>
                </div>

                <div class="form-group">
                <label for="konfirmasi">Ulangi Password</label>
                <input type="password" id="konfirmasi" name="konfirmasi" placeholder="Ketik ulang password" required>
                </div>

                <button type="submit" class="auth-submit">Simpan Password</button>
            </form>
            <?php endif; ?>

        </div>
        </div>
    </main>

</body>
</html>
<?php endif; ?>