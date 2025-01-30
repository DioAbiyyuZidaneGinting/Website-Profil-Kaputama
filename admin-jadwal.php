<?php
session_start();
require 'config/database.php'; // Pastikan pathnya benar

// Ambil data NIDN dari tabel dosen
$query_dosen = "SELECT nidn, full_name FROM dosen";
$result_dosen = $connection->query($query_dosen);

// Ambil data kode program studi dari tabel program_studi
$query_program_studi = "SELECT kode, nama FROM program_studi";
$result_program_studi = $connection->query($query_program_studi);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nidn = $_POST['nidn'];
    $hari = $_POST['hari'];
    $semester = $_POST['semester'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_keluar = $_POST['jam_keluar'];
    $kode = $_POST['kode'];
    $nama_mata_kuliah = $_POST['nama_mata_kuliah'];

    $sql = "INSERT INTO jadwal_mengajar (nidn, hari, semester, jam_masuk, jam_keluar, kode,nama_mata_kuliah)
            VALUES ('$nidn', '$hari', '$semester', '$jam_masuk', '$jam_keluar', '$kode','$nama_mata_kuliah')";

    if ($connection->query($sql) === TRUE) {
        echo "Jadwal berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
/* Mengatur dasar tampilan */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f5f5;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Menambahkan tampilan form dengan tampilan modern */
.form-container {
    width: 100%;
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Gaya untuk grup input */
.form-group {
    margin-bottom: 20px;
}

/* Gaya untuk label */
.form-group label {
    font-size: 14px;
    color: #333;
    margin-bottom: 8px;
    display: block;
}

/* Gaya untuk input dan select */
.form-group input[type="text"],
.form-group input[type="time"],
.form-group select {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 6px;
    box-sizing: border-box;
    background-color: #f9f9f9;
}

.form-group input[type="text"]:focus,
.form-group input[type="time"]:focus,
.form-group select:focus {
    border-color: #007bff;
    background-color: #fff;
}

/* Gaya untuk tombol submit */
.submit-btn {
    width: 100%;
    padding: 14px;
    font-size: 18px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.submit-btn:hover {
    background-color: #45a049;
}

/* Gaya untuk pesan sukses atau error */
.success-message,
.error-message {
    text-align: center;
    padding: 10px;
    margin-top: 20px;
    border-radius: 5px;
    font-size: 16px;
}

.success-message {
    background-color: #d4edda;
    color: #155724;
}

.error-message {
    background-color: #f8d7da;
    color: #721c24;
}

.form-group button{
    background-color:rgb(6, 22, 38);
    padding: 10px;
    width: 100%;
}
.form-group a{
    color: #fff;
    text-decoration: none;
}


</style>
<body>
<form method="post" action="admin-jadwal.php" class="form-container">
    <h2>Tambah Jadwal Mengajar</h2>
    <div class="form-group">
        <label for="nidn">NIDN:</label>
        <select name="nidn" id="nidn" required>
            <?php while ($row = $result_dosen->fetch_assoc()): ?>
                <option value="<?= $row['nidn']; ?>"><?= $row['nidn'] . ' - ' . $row['full_name']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="hari">Hari:</label>
        <input type="text" name="hari" id="hari" required>
    </div>

    <div class="form-group">
        <label for="semester">Semester:</label>
        <input type="text" name="semester" id="semester" required>
    </div>

    <div class="form-group">
        <label for="jam_masuk">Jam Masuk:</label>
        <input type="time" name="jam_masuk" id="jam_masuk" required>
    </div>

    <div class="form-group">
        <label for="jam_keluar">Jam Keluar:</label>
        <input type="time" name="jam_keluar" id="jam_keluar" required>
    </div>

    <div class="form-group">
        <label for="nama_mata_kuliah">Mata Kuliah:</label>
        <input type="text" name="nama_mata_kuliah" id="nama_mata_kuliah" required>
    </div>

    <div class="form-group">
        <label for="kode">Kode Program Studi:</label>
        <select name="kode" id="kode" required>
            <?php while ($row = $result_program_studi->fetch_assoc()): ?>
                <option value="<?= $row['kode']; ?>"><?= $row['kode'] . ' - ' . $row['nama']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" value="Tambah Jadwal" class="submit-btn">
    </div>
    <div class="form-group">
       <button><a href="admin-sia.php">BACK</a></button>
    </div>
</form>

</body>
</html>
