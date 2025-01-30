
<?php
session_start();

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
            margin-top: 60px;
            height: 100%;
            padding-bottom: 60px;
        }

        .containerkrs {
            padding: 20px;
            width: 100%;
            align-items: center;
            justify-content: center;
            margin-top: 60px;
        }

        .password {
            padding: 15px;
            background-color: rgb(0, 0, 0);
            text-align: start;
            border: 2px solid rgb(76, 76, 76);
            color: rgb(255, 0, 0);
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .password a {
            color: #ddd;
            text-decoration: underline;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #333;
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

        table thead tr th:nth-child(1) {
            width: 5%;
        }

        table thead tr td {
            width: 95%;
        }

        table thead tr th:nth-child(2) {
            width: 95%;
        }

        .ganjil {
            background-color: #ddd;
        }

        .editdata {
            background-color: red;
            padding: 7px;
            border-radius: 10px;
        }

        .editdata a {
            color: #f4f4f4;
        }

        .nilsem {
            margin-top: 20px;
            padding: 10px 10px 10px 10px;
            border: 1px solid #333;
        }

        .nilsem h3 {
            color: blue;
            width: 100%;
            border-bottom: 1px solid #333;
        }

        .view-button {
            padding: 10px;
            background-color: orange;
            border-radius: 5px;
        }

        .table-container {
            overflow-x: auto;
        }

        @media (max-width: 600px) {
            body {
                display: flex;
                flex-direction: column;
                height: 100vh;
                margin: 0;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .containerkrs {
                width: 100%;
                margin-top: -80px;
            }

            .containerkrs h2 {
                margin-top: -130px;
            }

            .view-button {
                margin: 10px;
            }

            .table-container {
                width: 100%;
                overflow-x: auto;
            }
        }

        @media print {
            .sidebar, .header {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <?php include 'partials/sidebar.php'; ?>
    </div>

    <div class="containerkrs">

        <div class="nilsem">
            <h3>Nilai Sementara MHS</h3>

            <div class="table-container">
                <table>
                    <tr>
                        <th>no</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Status</th>
                        <th>View</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>23451039</td>
                        <td>Dio Abiyyu Zidane Ginting</td>
                        <td>Teknik Informatika(S1)</td>
                        <td>Mahasiswa</td>
                        <td>
                            <button class="view-button"><a href="">Transkip</a></button>
                            <button class="view-button"><a href="">Lulus</a></button>
                            <button class="view-button"><a href="">Belum Lulus</a></button>
                            <button class="view-button"><a href="">Road Map</a></button>
                            <button class="view-button"><a href="">M. Kul Belum Diambil</a></button>
                        </td>
                    </tr>
                </table>
            </div>
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