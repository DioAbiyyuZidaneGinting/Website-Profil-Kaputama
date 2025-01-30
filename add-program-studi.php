<?php
require 'config/constants.php'; // Menggunakan konstanta dari constants.php
require 'config/database.php'; // Menggunakan koneksi dari database.php

try {
    // Menggunakan mysqli untuk koneksi
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($connection->connect_error) {
        die("Koneksi gagal: " . $connection->connect_error);
    }

    // Memeriksa jika data form dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];

        // Menyimpan data ke tabel program_studi
        $sql = "INSERT INTO program_studi (kode, nama) VALUES (?, ?)";
        $stmt = $connection->prepare($sql);

        // Bind parameter dengan tipe data yang sesuai
        $stmt->bind_param("ss", $kode, $nama);

        if ($stmt->execute()) {
            // Jika berhasil, tampilkan pop-up dan tombol Back
            echo '<script>
                alert("Program studi berhasil ditambahkan!");
                window.location.href = "admin-sia.php";
            </script>';
        } else {
            echo '<script>
                alert("Terjadi kesalahan saat menambahkan program studi.");
                window.location.href = "admin-sia.php";
            </script>';
        }
    }
} catch (Exception $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
