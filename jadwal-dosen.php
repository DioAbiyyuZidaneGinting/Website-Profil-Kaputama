<?php
session_start();
require 'config/database.php'; // Pastikan pathnya benar

// Cek apakah dosen sudah login (ada session)
if (!isset($_SESSION['nidn'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php');
    exit();
}

$nidn = $_SESSION['nidn']; // Ambil NIDN dari session dosen

// Ambil data jadwal mengajar untuk dosen yang sedang login
$query = "SELECT jm.id, jm.hari, jm.semester, jm.jam_masuk, jm.jam_keluar, ps.nama, jm.nama_mata_kuliah 
          FROM jadwal_mengajar jm
          JOIN program_studi ps ON jm.kode = ps.kode
          WHERE jm.nidn = '$nidn'";

// Mengambil data
$result = $connection->query($query);

// Membuat array untuk menyimpan jadwal per hari
$jadwal_per_hari = [
    'Senin' => [],
    'Selasa' => [],
    'Rabu' => [],
    'Kamis' => [],
    'Jumat' => []
];

// Mengelompokkan jadwal berdasarkan hari
while ($row = $result->fetch_assoc()) {
    $hari = $row['hari'];
    $jadwal_per_hari[$hari][] = $row;
}

$result = $connection->query($query);

?>

<?php
$connection->close();
?>

<?php include 'partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            /* Adjust as needed */
            position: fixed;
            top: 0;
            bottom: 0;
            margin-top: 60px;
            padding-bottom: 60px;
            box-shadow: 20px 20px 20px 0 rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            /* Add this line to enable scrolling */
            height: 100vh;
            /* Ensure sidebar takes up the full height of the viewport */
        }

        .sidebar::-webkit-scrollbar {
            display: none;
            /* Hide scrollbar */
        }



        .containerkrs {
            padding: 20px;
            width: calc(100% - 250px);
            /* Kurangi lebar sidebar dari total lebar */
            margin-left: 250px;
            /* Sesuaikan dengan lebar sidebar */
            align-items: center;
            justify-content: center;
            margin-top: 60px;
        }



        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #333;
            overflow-x: auto;
            max-width: 800px;
            /* Tambahkan properti ini */
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .nilai {
            font-weight: bold;
        }

        .semester-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .semester {
            width: 45%;
            margin: 20px;
        }


        @media (max-width: 600px) {
            body {
                display: flex;
                flex-direction: column;
                height: auto;
                /* Ubah dari 100vh ke auto */
                margin: 0;
                align-items: center;
                /* Tambahkan untuk memusatkan konten */
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .containerkrs {
                width: 100%;
                max-width: 600px;
                /* Tambahkan ini untuk membatasi lebar maksimum */
                margin: 0 auto;
                /* Tambahkan ini untuk memusatkan kontainer */
                padding: 20px;
                /* Tambahkan padding agar konten tidak menempel ke tepi layar */
            }

            .containerkrs h2 {
                margin-top: 20px;
                /* Sesuaikan margin jika perlu */
            }

            .view-button {
                margin: 10px;
            }

            .table-container {
                width: 100%;
                overflow-x: auto;
            }

            .semester-container {
                flex-direction: column;
            }

            .semester {
                width: 100%;
                margin: 20px 0;
            }

            .semester table {
                display: block;
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                border: 1px solid #333;
                overflow-x: auto;
                max-width: 800px;
            }
        }


        @media print {

            .sidebar,
            .header {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <?php include 'partials/sidebar-dosen.php'; ?>
    </div>

    <div class="containerkrs">
    <h2>Jadwal Mengajar Dosen</h2>

<h3>STMIK KAPUTAMA</h3>
<p>NIDN: <?php echo htmlspecialchars($_SESSION['nidn']); ?></p>
<p>Nama: <?php echo htmlspecialchars($_SESSION['full_name']); ?></p>

<?php if ($result->num_rows > 0): ?>
    <!-- Tabel Senin -->
    <h3>Hari: Senin</h3>
<table border="1">
<thead>
    <tr>
        <th>Hari</th>
        <th>Semester</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Program Studi</th>
        <th>Nama Mata Kuliah</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($jadwal_per_hari['Senin'] as $row): ?>
        <tr>
            <td><?php echo $row['hari']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['jam_masuk']; ?></td>
            <td><?php echo $row['jam_keluar']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nama_mata_kuliah']; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>

<?php if (!empty($jadwal_per_hari['Selasa'])): ?>
<h3>Hari: Selasa</h3>
<table border="1">
<thead>
    <tr>
        <th>Hari</th>
        <th>Semester</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Program Studi</th>
        <th>Nama Mata Kuliah</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($jadwal_per_hari['Selasa'] as $row): ?>
        <tr>
            <td><?php echo $row['hari']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['jam_masuk']; ?></td>
            <td><?php echo $row['jam_keluar']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nama_mata_kuliah']; ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>
<?php if (!empty($jadwal_per_hari['Rabu'])): ?>
    <h3>Hari: Rabu</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Semester</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Program Studi</th>
                <th>Nama Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jadwal_per_hari['Rabu'] as $row): ?>
                <tr>
                    <td><?php echo $row['hari']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><?php echo $row['jam_masuk']; ?></td>
                    <td><?php echo $row['jam_keluar']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nama_mata_kuliah']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if (!empty($jadwal_per_hari['Kamis'])): ?>
    <h3>Hari: Kamis</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Semester</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Program Studi</th>
                <th>Nama Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jadwal_per_hari['Kamis'] as $row): ?>
                <tr>
                    <td><?php echo $row['hari']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><?php echo $row['jam_masuk']; ?></td>
                    <td><?php echo $row['jam_keluar']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nama_mata_kuliah']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php if (!empty($jadwal_per_hari['Jumat'])): ?>
    <h3>Hari: Jumat</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Hari</th>
                <th>Semester</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Program Studi</th>
                <th>Nama Mata Kuliah</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jadwal_per_hari['Jumat'] as $row): ?>
                <tr>
                    <td><?php echo $row['hari']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><?php echo $row['jam_masuk']; ?></td>
                    <td><?php echo $row['jam_keluar']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nama_mata_kuliah']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>



    </div>



    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.querySelector('aside');
            const showSidebarBtn = document.getElementById('show__sidebar-btn');
            const hideSidebarBtn = document.getElementById('hide__sidebar-btn');

            // Tampilkan sidebar saat tombol show diklik
            showSidebarBtn.addEventListener('click', () => {
                sidebar.classList.add('active');
                showSidebarBtn.style.display = 'none';
                hideSidebarBtn.style.display = 'block';
            });

            // Sembunyikan sidebar saat tombol hide diklik
            hideSidebarBtn.addEventListener('click', () => {
                sidebar.classList.remove('active');
                hideSidebarBtn.style.display = 'none';
                showSidebarBtn.style.display = 'block';
            });

            // Pastikan tombol yang benar ditampilkan berdasarkan lebar layar saat pertama kali dimuat
            const updateSidebarToggleButtons = () => {
                if (window.innerWidth <= 600) {
                    showSidebarBtn.style.display = sidebar.classList.contains('active') ? 'none' : 'block';
                    hideSidebarBtn.style.display = sidebar.classList.contains('active') ? 'block' : 'none';
                } else {
                    showSidebarBtn.style.display = 'none';
                    hideSidebarBtn.style.display = 'none';
                }
            };

            // Panggil fungsi ini saat halaman pertama kali dimuat dan saat ukuran layar berubah
            updateSidebarToggleButtons();
            window.addEventListener('resize', updateSidebarToggleButtons);
        });

        const navItems = document.querySelector('.nav__items');
        const openNavBtn = document.querySelector('#open__nav-btn');
        const closeNavBtn = document.querySelector('#close__nav-btn');

        // Buka nav dropdown
        const openNav = () => {
            navItems.style.display = 'flex';
            openNavBtn.style.display = 'none';
            closeNavBtn.style.display = 'inline-block';
        }
        // Tutup nav dropdown
        const closeNav = () => {
            navItems.style.display = 'none';
            openNavBtn.style.display = 'inline-block';
            closeNavBtn.style.display = 'none';
        }
        openNavBtn.addEventListener('click', openNav);
        closeNavBtn.addEventListener('click', closeNav);

        function closePerhatian() {
            document.getElementById("perhatian").style.display = "none";
        }
    </script>
</body>

</html>



