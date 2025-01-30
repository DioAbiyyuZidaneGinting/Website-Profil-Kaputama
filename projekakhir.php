<?php
// siakaputama.php
session_start();

// Include constants.php setelah session_start()
require_once 'config/constants.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login-sia.php');
  exit;
}

// Pastikan data npm sudah disimpan di session
if (!isset($_SESSION['npm'])) {
  // Jika tidak ada data npm di session, maka ambil data npm dari database
  $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
  $stmt = $pdo->prepare('SELECT npm FROM sia WHERE username = ?');
  $stmt->execute([$_SESSION['username']]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION['npm'] = $result['npm'];
}



?>

<?php include 'partials/header.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peta STMIK Kaputama</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      line-height: 1.6;
      background-color: #f4f4f4;
      color: var(--color-gray-200);
    }

    .map-container {
      display: flex;
      margin-top: 30px;
    }




    .map-content {
      width: 100%;
      /* Full width */
      flex-grow: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
      box-sizing: border-box;
      margin-top: 50px;
    }


    .nama {
      font-weight: bold;
    }

    .telegram {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: 1;
    }

    .telegram1 {
      padding: 20px 0 20px 0;
      text-align: center;
      border: 2px solid #181738;
      color: #181738;
      border-radius: 20px;
      width: 330px;
    }




    .telegram1 a {
      margin-top: 20px;
      text-align: center;
      justify-content: center;
      align-items: center;
    }

    .link-telegram {
      border-top: 1px solidrgb(80, 76, 194);
      width: 100%;
      margin-top: 50px;
      padding: 20px 0 15px 0;
    }

    .link-telegram a {
      color: rgb(70, 67, 161);
    }

    .icon-tele {
      font-size: 40px;
    }




    @media (max-width: 600px) {

      .map-container {
        flex-direction: column;
        align-items: center;
        padding: 10px;
      }

      .map-content {
        width: 100%;
        /* Full width */
        padding: 20px;
        box-sizing: border-box;
      }



      .telegram {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 100%;
        align-items: center;

      }

      .telegram1 {
        width: 90%;

        padding: 20px;
        border: 2px solid #181738;
        border-radius: 20px;
        text-align: center;
      }


      /* Ensuring links in telegram are centered */
      .link-telegram {
        margin-top: 50px;
        padding: 20px 0 15px 0;
        width: 100%;
        text-align: center;
      }

      .link-telegram a {
        color: rgb(70, 67, 161);
      }


    }
  </style>
</head>

<body>


  <div class="map-container">

    <?php include 'partials/sidebar.php'; ?>


    <!-- Konten utama -->
    <div class="map-content">
     

      <div class="telegram">

        <div class="telegram1">
          <div class="icon-tele">
            <a href=""><i class='bx bx-paperclip'></i></a>
          </div>
          <h3>Skripsi/Tugas Akhir</h3>
          <p>Pengajuan judul skripsi/tugas akhir melalui link dibawah ini</p>
          <div class="link-telegram">
            <a href="https://sia.kaputama.ac.id/siak.php?module=pamhs&act=ajukan-judul">ajukan judul skripsi/tugas akhir<i class='bx bx-right-arrow-alt' ></i> </a>
          </div>
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
  </script>

</body>

</html>