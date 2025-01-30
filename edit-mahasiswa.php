<?php
session_start();
include 'config/database.php';

// Cek apakah ada 'nidn' di URL
if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    // Ambil data dosen berdasarkan nidn dari database
    $query = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
    $result = mysqli_query($connection, $query);
    $mahasiswa = mysqli_fetch_assoc($result);
    
    if (!$mahasiswa) {
        echo "Mahasiswa tidak ditemukan!";
        exit;
    }
} else {
    echo "NPM tidak ditemukan!";
    exit;
}

// Proses update data setelah form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    // Update data dosen di database
    $update_query = "UPDATE mahasiswa SET 
        full_name = '$full_name',
        jenis_kelamin = '$jenis_kelamin',
        tempat_lahir = '$tempat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        nama_ayah = '$nama_ayah',
        nama_ibu = '$nama_ibu',
        no_telp = '$no_telp',
        alamat = '$alamat'
        WHERE npm = '$npm'";

    if (mysqli_query($connection, $update_query)) {
        // Redirect ke halaman account-dosen.php setelah berhasil
        header("Location: account.php");
        exit();  // Pastikan skrip berhenti setelah redirect
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partials/header.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dosen</title>
</head>
<body>
    <div class="containerkrs">
        <h2>Edit Data Dosen</h2>
        <form action="edit-mahasiswa.php?npm=<?php echo $npm; ?>" method="POST">
            <label for="full_name">Nama Lengkap:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($mahasiswa['full_name']); ?>" required><br><br>
            
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="L" <?php echo ($mahasiswa['jenis_kelamin'] === 'L' ? 'selected' : ''); ?>>Laki-laki</option>
                <option value="P" <?php echo ($mahasiswa['jenis_kelamin'] === 'P' ? 'selected' : ''); ?>>Perempuan</option>
            </select><br><br>

            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo htmlspecialchars($mahasiswa['tempat_lahir']); ?>" required><br><br>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $mahasiswa['tanggal_lahir']; ?>" required><br><br>

            <label for="nama_ayah">Nama Ayah:</label>
            <input type="text" id="nama_ayah" name="nama_ayah" value="<?php echo htmlspecialchars($mahasiswa['nama_ayah']); ?>"><br><br>

            <label for="nama_ibu">Nama Ibu:</label>
            <input type="text" id="nama_ibu" name="nama_ibu" value="<?php echo htmlspecialchars($mahasiswa['nama_ibu']); ?>"><br><br>

            <label for="no_telp">No. Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($mahasiswa['no_telp']); ?>" required><br><br>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required><?php echo htmlspecialchars($mahasiswa['alamat']); ?></textarea><br><br>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
