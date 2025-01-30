<?php
// Pin yang benar
$correctPin = '1234';

// Periksa apakah form sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil PIN yang dimasukkan
    $pin = $_POST['pin'];

    // Verifikasi PIN
    if ($pin === $correctPin) {
        // Jika PIN benar, arahkan ke halaman register
        header('Location: register-sia.html');
        exit;
    } else {
        // Jika PIN salah, tampilkan pesan error
        echo '<p>PIN Salah! Silakan coba lagi.</p>';
    }
}
?>
