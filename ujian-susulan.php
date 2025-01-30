<?php
session_start();
?>

<?php include 'partials/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            position: fixed;
            top: 0;
            bottom: 0;
            margin-top: 60px;
            padding-bottom: 60px;
            box-shadow: 20px 20px 20px 0 rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .containerkrs {
            padding: 20px;
            width: calc(100% - 250px);
            margin-left: 250px;
            margin-top: 60px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #333;
        }

        #hasilAkhirButton {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        #hasilAkhirButton:hover {
            background-color: #555;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        .daftarM1 {
            border: 1px solid #333;
            padding: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #333;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }
        

        .filter-input {
            margin-bottom: 20px;
            padding: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }

        @media (max-width: 600px) {
            body {
        display: flex;
        flex-direction: column;
        height: auto;
        margin: 0;
        align-items: center;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }

    .containerkrs {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

        }

        #entriesPerPage{
            background-color: #ccc;
            padding: 10px;
            margin-bottom: 20px;
            color: #333;
        }

        .filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-input {
            background-color: #ccc;
            flex: 1;
            margin-right: 10px;
            padding: 10px;
            width: 100px;
            border: 1px solid #ccc;
        }

        .entries-container {
            display: flex;
            align-items: center;
        }

        .entries-container label,
        .entries-container select {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <?php include 'partials/sidebar.php'; ?>
    </div>

    <div class="containerkrs">

    <div class="telegram">

<div class="telegram1">
  <div class="icon-tele">
    <a href=""><i class='bx bx-file'></i></a>
  </div>
  <h3>Ujian Tengah Semester (UTS) Susulan</h3>
  <p>Untuk mendaftar ujian tengah semester susulan silahkan klik link dibawah ini :</p>
  <div class="link-telegram">
    <a href="https://sia.kaputama.ac.id/siak.php?module=ujian-susulan&act=uts">Daftar Ujian Susulan<i class='bx bx-right-arrow-alt' ></i> </a>
  </div>
</div>
<div class="telegram1">
  <div class="icon-tele">
    <a href=""><i class='bx bx-file'></i></a>
  </div>
  <h3>Ujian Akhir Semester (UAS) Susulan</h3>
  <p>Untuk mendaftar ujian akhir semester susulan silahkan klik link dibawah ini :</p>
  <div class="link-telegram">
    <a href="https://sia.kaputama.ac.id/siak.php?module=ujian-susulan&act=uas">Daftar Ujian Susulan<i class='bx bx-right-arrow-alt' ></i> </a>
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