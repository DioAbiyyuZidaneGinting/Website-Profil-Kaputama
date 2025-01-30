<?php
session_start();

// Koneksi ke database
$pdo = new PDO('mysql:host=localhost; dbname=kaputama', 'root', '');

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user berdasarkan username
$stmt = $pdo->prepare('SELECT * FROM mahasiswa WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);



// Jika user tidak ditemukan di tabel mahasiswa, coba cari di tabel dosen
if (!$user) {
  $stmt = $pdo->prepare('SELECT * FROM dosen WHERE username = ?');
  $stmt->execute([$username]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

}
if (!$user) {
// Query untuk mencari admin berdasarkan username
$stmt = $pdo->prepare('SELECT * FROM admin WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

}

// Verifikasi password
if ($user && password_verify($password, $user['password'])) {
  // Login berhasil
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $user['username']; 
  $_SESSION['role'] = $user['role'];
  
  if ($user['role'] === 'user') {
    $_SESSION['npm'] = $user['npm'];
    $_SESSION['full_name'] = $user['full_name']; 
    $_SESSION['no_telp'] = $user['no_telp'];  
    $_SESSION['nama_ayah'] = $user['nama_ayah'];  
    $_SESSION['nama_ibu'] = $user['nama_ibu'];  
    $_SESSION['jenis_kelamin'] = $user['jenis_kelamin']; 
    $_SESSION['tempat_lahir'] = $user['tempat_lahir'];  
    $_SESSION['tanggal_lahir'] = $user['tanggal_lahir']; 
    $_SESSION['email'] = $user['email']; 
    $_SESSION['alamat'] = $user['alamat']; 
    $_SESSION['program_studi_nama'] = $user['program_studi_nama']; 
    $_SESSION['nidn_pa'] = $user['nidn_pa']; 
    $_SESSION['nama_pa'] = $user['nama_pa']; 
    $_SESSION['no_hp_pa'] = $user['no_hp_pa']; 
    header('Location: siakaputama.php');

  } elseif ($user['role'] === 'dosen') {
    $_SESSION['nidn'] = $user['nidn']; 
    $_SESSION['full_name'] = $user['full_name']; 
    $_SESSION['no_telp'] = $user['no_telp']; 
    $_SESSION['nama_ayah'] = $user['nama_ayah'];  
    $_SESSION['nama_ibu'] = $user['nama_ibu'];  
    $_SESSION['jenis_kelamin'] = $user['jenis_kelamin'];  
    $_SESSION['tempat_lahir'] = $user['tempat_lahir'];  
    $_SESSION['tanggal_lahir'] = $user['tanggal_lahir']; 
    $_SESSION['email'] = $user['email'];  
    $_SESSION['alamat'] = $user['alamat'];  
    header('Location: dosen.php');

  } elseif ($user['role'] === 'admin') {
    $_SESSION['nia'] = $user['nia']; 
    $_SESSION['full_name'] = $user['full_name']; 
    $_SESSION['no_telp'] = $user['no_telp']; 
    $_SESSION['nama_ayah'] = $user['nama_ayah'];  
    $_SESSION['nama_ibu'] = $user['nama_ibu'];  
    $_SESSION['jenis_kelamin'] = $user['jenis_kelamin'];  
    $_SESSION['tempat_lahir'] = $user['tempat_lahir'];  
    $_SESSION['tanggal_lahir'] = $user['tanggal_lahir']; 
    $_SESSION['email'] = $user['email'];  
    $_SESSION['alamat'] = $user['alamat'];  
    header('Location: admin-sia.php'); 
  }
  exit;
} else {
  // Login gagal
  echo 'Username atau password salah!';
  echo '<br><a href="login-sia.php">Kembali ke halaman login</a>';
}
?>
