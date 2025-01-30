<?php
session_start();

// Koneksi ke database
$pdo = new PDO('mysql:host=localhost;dbname=kaputama', 'root', '');

// Ambil data dari form pendaftaran
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$role = $_POST['role'];

// Data tambahan
$jenis_kelamin = $_POST['jenis_kelamin'];
$nama_ayah = $_POST['nama_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Upload foto profil
$profile_picture = '';
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "uploads/profile_pictures/";
    $profile_picture = $target_dir . basename($_FILES["profile_picture"]["name"]);
    move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture);
}

if ($role === 'user') {
    // Dapatkan NPM terakhir dari tabel mahasiswa
    $lastNpmQuery = $pdo->query("SELECT MAX(npm) AS lastNpm FROM mahasiswa WHERE npm LIKE '2025%'");
    $lastNpm = $lastNpmQuery->fetch(PDO::FETCH_ASSOC)['lastNpm'];

    // Tentukan NPM berikutnya
    $nextSequence = $lastNpm ? (int)substr($lastNpm, 4) + 1 : 1;
    $padding = max(4 - strlen((string)$nextSequence), 1);
    $newNpm = '2025' . str_pad($nextSequence, $padding, '0', STR_PAD_LEFT);

    // Masukkan data ke tabel mahasiswa
    $stmt = $pdo->prepare('INSERT INTO mahasiswa (username, password, full_name, email, jenis_kelamin, nama_ayah, nama_ibu, no_telp, alamat, tempat_lahir, tanggal_lahir, profile_picture, npm) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$username, $password, $full_name, $email, $jenis_kelamin, $nama_ayah, $nama_ibu, $no_telp, $alamat, $tempat_lahir, $tanggal_lahir, $profile_picture, $newNpm]);

} elseif ($role === 'dosen') {
// Buat NIDN baru
$newNidn = 'D' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

// Masukkan data ke tabel dosen
$stmt = $pdo->prepare('INSERT INTO dosen (username, password, full_name, email, profile_dosen, nidn, jenis_kelamin, nama_ayah, nama_ibu, no_telp, alamat, tempat_lahir, tanggal_lahir) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$username, $password, $full_name, $email, $profile_picture, $newNidn, $jenis_kelamin, $nama_ayah, $nama_ibu, $no_telp, $alamat, $tempat_lahir, $tanggal_lahir]);

} elseif ($role === 'admin') {
    // Tentukan NIA, misalnya berdasarkan format tertentu
    $lastNiaQuery = $pdo->query("SELECT MAX(nia) AS lastNia FROM admin WHERE nia LIKE 'A%'");
    $lastNia = $lastNiaQuery->fetch(PDO::FETCH_ASSOC)['lastNia'];

    // Tentukan NIA berikutnya
    $nextSequence = $lastNia ? (int)substr($lastNia, 1) + 1 : 1;
    $padding = max(4 - strlen((string)$nextSequence), 1);
    $newNia = 'A' . str_pad($nextSequence, $padding, '0', STR_PAD_LEFT);

    // Masukkan data ke tabel admin dengan nia
    $stmt = $pdo->prepare('INSERT INTO admin (username, password, full_name, email, role, jenis_kelamin, nama_ayah, nama_ibu, no_telp, alamat, tempat_lahir, tanggal_lahir, profile_picture, nia) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute([$username, $password, $full_name, $email, $role, $jenis_kelamin, $nama_ayah, $nama_ibu, $no_telp, $alamat, $tempat_lahir, $tanggal_lahir, $profile_picture, $newNia]);
}



echo "Pendaftaran berhasil! Silakan login.";
echo '<br><a href="login-sia.php">Login sekarang</a>';
?>
