<?php
session_start();

// Hapus session
session_unset();
session_destroy();

// Arahkan pengguna ke halaman login
header('Location: login-sia.php');
exit;
?>