<?php
session_start();

?>

<?php include 'partials/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>
  body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh; /* Agar body memenuhi layar */
            
        }
        .sidebar{
          margin-top: 60px;
          height: 100%;

          padding-bottom: 60px; 
        }

        .containerkrs{
          padding: 20px;
          width: 100%;
          align-items: center;
          justify-content: center;
          margin-top: 60px;
        }


        h2 {
            text-align: center;

        }

        .table-container {
            width: 100%;
            overflow-x: auto; /* Allow horizontal scrolling */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: none;
        }

        th, td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button {
          width: 100%;
            display: block;
            margin: 20px auto;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .jumlah {
            width: 45.5%;
        }

        .button:hover {
            border: none;
            background-color: #0056b3;
        }

        .perhatian {
      padding: 15px;
      background-color: rgba(24, 23, 56, 0.4);
      text-align: start;
      border: 2px solid #181738;
      color:rgb(255, 255, 255);
      border-radius: 20px;
      display: flex;
      justify-content: space-between;
            align-items: center;
    }
    .perhatian p {
            margin: 0;
        }
        .perhatian i {
            cursor: pointer;
            font-size: 20px;
        }

        @media (max-width: 600px) {
            .sidebar {
                width: 100%; /* Sidebar menjadi 100% pada layar kecil */
                height: auto;
                position: relative;
            }

            .containerkrs {
                margin-left: 0; /* Hilangkan margin kiri pada layar kecil */
                margin-top: 100px;
            }

            .table-container {
                overflow-x: auto; /* Enable horizontal scrolling for small screens */
            }
        }
</style>

</head>
<body>

<div class="sidebar">
<?php include 'partials/sidebar.php'; ?>
</div>

    <div class="containerkrs">
    <div class="perhatian" id="perhatian">
        <p>Kartu Rencana Studi (KRS) anda telah disetujui oleh dosen pembimbing akademik dan ketua program studi</p>
        <i class='bx bx-x' onclick="closePerhatian()"></i>
    </div>
        <h2>Kartu Rencana Studi (KRS)</h2>

        <table class="table">
            <tr>
                <th>NPM</th>
                <td>23451039</td>
            </tr>
            <tr>
                <th>NAMA</th>
                <td>Dio Abiyyu Zidane Ginting</td>
            </tr>
            <tr>
                <th>Tahun Akademik</th>
                <td>2024/2025</td>
            </tr>
            <tr>
                <th>Semester</th>
                <td>Gasal</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>Teknik Informatika(S1)</td>
            </tr>
        </table>
        <div class="table-container">
        <table class="table">
            <thead>
                <tr class="header">
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Dosen Pengampu</th>
                    <th>No WA</th>
                    <th>Hari</th>
                    <th>Pukul</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>MBPS45301</td>
                    <td>Jaringan Komputer</td>
                    <td>3</td>
                    <td>Husnul Khair. M.Kom</td>
                    <td>085261369545</td>
                    <td>SENIN</td>
                    <td>08.00-11.15</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>MBPS45302</td>
                    <td>Pemrograman Bergerak</td>
                    <td>3</td>
                    <td>Ratih Puspadini, S.T, M.Kom</td>
                    <td>081269911388</td>
                    <td>SENIN</td>
                    <td>11.30-14.45</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>MBPS45304</td>
                    <td>Pemrograman Web</td>
                    <td>3</td>
                    <td>Bendra Wardana, M.Kom</td>
                    <td>081261119686</td>
                    <td>JUMAT</td>
                    <td>08.00-11.00</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>MBPS45305</td>
                    <td>Rekayasa Perangkat Lunak</td>
                    <td>3</td>
                    <td>Marto Sihombing, M.Kom</td>
                    <td>-</td>
                    <td>RABU</td>
                    <td>10.30-13.00</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>MBRK45303	</td>
                    <td>Pemrograman Berorientasi Objek</td>
                    <td>3</td>
                    <td>Magdalena Simanjuntak, S. Kom, M. Kom</td>
                    <td>081376539184</td>
                    <td>Kamis</td>
                    <td>11.30-14.45</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>MBRK45306	</td>
                    <td>Teknik Riset Operasi</td>
                    <td>3</td>
                    <td>Anton Sihombing, SE, MM</td>
                    <td>081375110864</td>
                    <td>Rabu</td>
                    <td>08.00-10.30</td>
                </tr>
                </tbody>
        </table>
        </div>
        <table class="jumlah">
            <tr>
                <th>Total SKS</th>
                <td>18</td>
            </tr>
            <tr>
                <th>Jumlah Mata Kuliah</th>
                <td>6</td>
            </tr>
        </table>
        <button id="cetak-krs" class="button" onclick="window.location.href='ckrs.php'">Cetak KRS</button>        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

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
        document.getElementById("perhatian").style.display = "none";
    }
</script>
  </script>
</body>
</html>