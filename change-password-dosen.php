<?php
session_start();
require 'config/database.php'; // Pastikan pathnya benar

// Periksa apakah user telah login
if (!isset($_SESSION['nidn'])) {
    header("Location: login.php");
    exit;
}

// Inisialisasi pesan error dan sukses
$error = $success = "";

// Proses form ketika tombol submit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nidn = $_SESSION['nidn'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Ambil password lama dari database
    $query = "SELECT password FROM dosen WHERE nidn = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $nidn);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();
    $stmt->close();

    // Verifikasi password lama
    if (!password_verify($current_password, $hashed_password)) {
        $error = "Password lama salah!";
    } elseif ($new_password !== $confirm_password) {
        $error = "Konfirmasi password baru tidak sesuai!";
    } else {
        // Hash password baru
        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password di database
        $update_query = "UPDATE dosen SET password = ? WHERE nidn = ?";
        $stmt = $connection->prepare($update_query);
        $stmt->bind_param("ss", $new_hashed_password, $nidn);

        if ($stmt->execute()) {
            $success = "Password berhasil diubah!";
        } else {
            $error = "Terjadi kesalahan saat mengubah password.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Password</title>
</head>
<body>
    <h2>Ganti Password</h2>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <?php if ($success): ?>
        <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <form action="change-password-dosen.php" method="POST">

        <label for="current_password">Password Lama:</label><br>
        <input type="password" name="current_password" id="current_password" required><br><br>

        <label for="new_password">Password Baru:</label><br>
        <input type="password" name="new_password" id="new_password" required><br><br>

        <label for="confirm_password">Konfirmasi Password Baru:</label><br>
        <input type="password" name="confirm_password" id="confirm_password" required><br><br>

        <button type="submit">Ganti Password</button>
    </form>
</body>
</html>
