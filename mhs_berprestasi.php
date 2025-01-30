
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

        .pagination-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 20px;
}

.pagination {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
}

.pagination li {
  margin: 0 5px;
}

.pagination li a {
  text-decoration: none;
  color: #333;
  padding: 5px 10px;
  border: 1px solid #ddd;
  border-radius: 3px;
}

.pagination li a:hover {
  background-color: #f4f4f4;
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
  overflow-x: auto; /* Tetap aktifkan scroll horizontal jika diperlukan */
  overflow-y: hidden; /* Nonaktifkan scroll vertikal */
  max-height: 100%; /* Atur tinggi maksimum sesuai kebutuhan */
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
            <h3>Ujian Perbaikan</h3>

            <div class="table-container">
            <table>
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Prodi</th>
      <th>Angkatan</th>
      <th>Detail</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Sistem Informasi (S1)</td>
      <td>2011</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Sistem Informasi (S1)</td>
      <td>2012</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>3</td>
      <td>Sistem Informasi (S1)</td>
      <td>2013</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>4</td>
      <td>Sistem Informasi (S1)</td>
      <td>2014</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>5</td>
      <td>Sistem Informasi (S1)</td>
      <td>2015</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>6</td>
      <td>Sistem Informasi (S1)</td>
      <td>2016</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>7</td>
      <td>Sistem Informasi (S1)</td>
      <td>2017</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>8</td>
      <td>Sistem Informasi (S1)</td>
      <td>2018</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>9</td>
      <td>Sistem Informasi (S1)</td>
      <td>2019</td>
      <td><button>Detail</button></td>
    </tr>
    <tr>
      <td>10</td>
      <td>Sistem Informasi (S1)</td>
      <td>2020</td>
      <td><button>Detail</button></td>
    </tr>
  </tbody>
</table>

<div class="pagination-container">
  <p>Showing 1 to 10 of 42 entries</p>
  <ul class="pagination">
    <li><a href="#">Previous</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">Next</a></li>
  </ul>
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

        function closePerhatian() {
            document.getElementById("perhatian").style.display = "none";
        }
    </script>
</body>

</html>