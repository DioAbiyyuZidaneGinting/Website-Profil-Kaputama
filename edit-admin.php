<?php
session_start();
include 'config/database.php';

// Cek apakah ada 'nia' di URL
if (isset($_GET['nia'])) {
    $nia = $_GET['nia'];

    // Ambil data dosen berdasarkan nia dari database
    $query = "SELECT * FROM admin WHERE nia = '$nia'";
    $result = mysqli_query($connection, $query);
    $admin = mysqli_fetch_assoc($result);
    
    if (!$admin) {
        echo "Mahasiswa tidak ditemukan!";
        exit;
    }
} else {
    echo "NIA tidak ditemukan!";
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
    $update_query = "UPDATE admin SET 
        full_name = '$full_name',
        jenis_kelamin = '$jenis_kelamin',
        tempat_lahir = '$tempat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        nama_ayah = '$nama_ayah',
        nama_ibu = '$nama_ibu',
        no_telp = '$no_telp',
        alamat = '$alamat'
        WHERE nia = '$nia'";

    if (mysqli_query($connection, $update_query)) {
        header("Location: account.php");
        exit();
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
    <title>Edit Data Admin</title>
    <style>

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .containerkrs {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 40px auto;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        form input, form select, form textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="containerkrs">
        <h2>Edit Data Admin</h2>
        <form action="edit-admin.php?nia=<?php echo $nia; ?>" method="POST">
            <label for="full_name">Nama Lengkap:</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($admin['full_name']); ?>" required>
            
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin">
                <option value="L" <?php echo ($admin['jenis_kelamin'] === 'L' ? 'selected' : ''); ?>>Laki-laki</option>
                <option value="P" <?php echo ($admin['jenis_kelamin'] === 'P' ? 'selected' : ''); ?>>Perempuan</option>
            </select>

            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo htmlspecialchars($admin['tempat_lahir']); ?>" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $admin['tanggal_lahir']; ?>" required>

            <label for="nama_ayah">Nama Ayah:</label>
            <input type="text" id="nama_ayah" name="nama_ayah" value="<?php echo htmlspecialchars($admin['nama_ayah']); ?>">

            <label for="nama_ibu">Nama Ibu:</label>
            <input type="text" id="nama_ibu" name="nama_ibu" value="<?php echo htmlspecialchars($admin['nama_ibu']); ?>">

            <label for="no_telp">No. Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" value="<?php echo htmlspecialchars($admin['no_telp']); ?>" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required><?php echo htmlspecialchars($admin['alamat']); ?></textarea>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
