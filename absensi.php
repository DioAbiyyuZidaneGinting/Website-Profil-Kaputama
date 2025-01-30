<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit;
}

$pdo = new PDO('mysql:host=localhost;dbname=kaputama', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // Query untuk mengambil data mahasiswa
    $stmt = $pdo->query("SELECT * FROM mahasiswa");
    $mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
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
    <h2>Absensi Mahasiswa</h2>
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Absensi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($mahasiswa as $row) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['npm']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['full_name']) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                    echo "<td><button class='btn btn-success'>Hadir</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
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




