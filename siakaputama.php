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
  $stmt = $pdo->prepare('SELECT npm FROM mahasiswa WHERE username = ?');
  $stmt->execute([$_SESSION['username']]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION['npm'] = $result['npm'];
}

// Fungsi untuk menghitung total kehadiran
function hitungTotalKehadiran($kehadiran) {
  $totalHadir = array_sum($kehadiran);
  $totalPertemuan = count($kehadiran);
  return ($totalHadir / $totalPertemuan) * 100;
}

// Data absensi (contoh data statis, bisa diganti dengan data dari database)
$absensi = [
  [
    'kode_mk' => 'MBPS45301',
    'matakuliah' => 'Jaringan Komputer',
    'dosen' => 'Husnul Khair. M.Kom',
    'kehadiran' => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0], // 0 berarti tidak hadir
  ],
  [
    'kode_mk' => 'MBPS45302',
    'matakuliah' => 'Pemrograman Bergerak',
    'dosen' => 'Ratih Puspadini, S.T, M.Kom',
    'kehadiran' => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0], // 0 berarti tidak hadir
  ],
  [
    'kode_mk' => 'MBRK45306',
    'matakuliah' => 'Teknik Riset Operasi',
    'dosen' => 'Anton Sihombing, SE, MM',
    'kehadiran' => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0], // 0 berarti tidak hadir
  ],
  [
    'kode_mk' => 'MBPS45305',
    'matakuliah' => 'Rekayasa Perangkat Lunak',
    'dosen' => 'Marto Sihombing, M.Kom',
    'kehadiran' => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0], // 0 berarti tidak hadir
  ],
  [
    'kode_mk' => 'MBRK45303',
    'matakuliah' => 'Pemrograman Berorientasi Objek',
    'dosen' => 'Magdalena Simanjuntak, S. Kom, M. Kom',
    'kehadiran' => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0], // 0 berarti tidak hadir
  ],
  [
    'kode_mk' => 'MBPS45304',
    'matakuliah' => 'Pemrograman Web',
    'dosen' => 'Bendra Wardana, M.Kom',
    'kehadiran' => [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0], // 0 berarti tidak hadir
  ],
  // Tambahkan data absensi lainnya di sini
];



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
    }

    .icon-container {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 20px;
    }

    .icon-container a {
      background: var(--color-bg);
      border-radius: 50%;
      width: 2.3rem;
      height: 2.3rem;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 10px;
      font-size: 20px;
    }

    .icon-container a:hover {
      background: var(--color-white);
      color: var(--color-bg);
    }

    .perhatian {
      padding: 15px;
      background-color: rgba(24, 23, 56, 0.4);
      text-align: start;
      border: 2px solid #181738;
      color: #181738;
      border-radius: 20px;
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

    .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }

  .popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    width: 300px;
  }

  .popup-content h2 {
    margin-top: 0;
  }

  .popup-content a {
    display: block;
    margin: 10px 0;
    color: #007bff;
  }

  .popup-content button {
    margin-top: 20px;
  }


    .telegram1 {
      padding: 20px 0 20px 0;
      text-align: center;
      border: 2px solid #181738;
      color: #181738;
      border-radius: 20px;
      width: 330px;
    }

    .kotak1 {
      margin-top: 20px;
      padding: 0 0 10px 0;
      text-align: center;
      width: 100%;
      border: 2px solid #181738;
      color: #181738;
      border-radius: 10px;


    }

    .link-kotak {
      border-top: 1px solid #181738;
      width: 100%;
      padding: 20px 0 15px 0;
      overflow-x: auto;
      max-width: 100%;
      /* Tambahkan ini */
    }

    .link-kotak table {
      border: none;
      width: 100%;
      border-collapse: collapse;
      min-width: 800px;
      /* Tambahkan ini */
    }

    .link-kotak th,
    .link-kotak td {
      border: 1px solid #181738;
      padding: 13px 17px 0 0;
      
    }

    .link-kotak .id {

      text-align: center;
    }

    .link-kotak th {
      background-color: #f2f2f2;
      font-weight: bold;
      width: 100px;
      padding: 10px;
      text-align: left;
    }

    .link-kotak td {
      width: 100px;
      
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

    .ceklis{
      text-align: center;
      color: #181738;
      font-weight: bold;
    }

    .kiri{
      text-align: left;
      font-size: 13px;
    }


    @media (max-width: 600px) {

      /* Container should take full width but with padding to keep it neat */
      .map-container {
        flex-direction: column;
        /* Stack the map and sidebar */
        align-items: center;
        /* Center the content horizontally */
        padding: 10px;
      }

      .map-content {
        width: 100%;
        /* Full width */
        padding: 20px;
        box-sizing: border-box;
      }

      /* Center the "perhatian" box and adjust the width */
      .perhatian {
        width: 100%;
        /* Reduce width for small screens */
        font-size: 14px;
        margin: 0 auto;
      }

      /* Adjust the telegram box layout */
      .telegram {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        /* Stack items vertically */
        gap: 20px;
        width: 100%;
        align-items: center;
        /* Center the items */
      }

      /* Adjusting the telegram1 box to take full width but stay centered */
      .telegram1 {
        width: 90%;
        /* Use percentage width for responsiveness */
        padding: 20px;
        border: 2px solid #181738;
        border-radius: 20px;
        text-align: center;
      }

      /* Center the kotak1 container and adjust width */
      .kotak1 {
        display: flex;
        flex-direction: column;
        /* Stack items vertically */
        gap: 20px;
        width: 100%;
        align-items: center;
        padding: 20px;
        box-sizing: border-box;
        text-align: center;
        margin-top: 20px;
        border-radius: 10px;
      }

      /* For the table, allow horizontal scrolling */
      .link-kotak {
        overflow-x: auto;
        margin-top: 20px;
        width: 100%;
      }

      .link-kotak table {
        width: 100%;
        min-width: 600px;
        /* Ensure the table has a min-width */
      }

      .link-kotak th,
      .link-kotak td {
        font-size: 12px;
        padding: 20px;
        width: 100px;
      }

      .link-kotak td {

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

    .popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  justify-content: center;
  align-items: center;
  z-index: 1000;
  animation: fadeIn 0.5s ease-out;
}

.popup-content {
  background: #fff;
  padding: 20px;
  border-radius: 10px;
  text-align: center;
  width: 500px;
  animation: slideDown 0.5s ease-out;
}

#typingText {
  font-size: 16px;
  line-height: 1.5;
  font-family: 'Montserrat', sans-serif;
  color: #181738;
  white-space: normal; /* Allow text to wrap */
  overflow: hidden;
  display: inline-block;
  width: 100%;
  animation: typing 0s steps(40, end) 1s forwards;
}


@keyframes typing {
  from {
    width: 0;
  }
  to {
    width: 100%;
  }
}

@keyframes blink {
  50% {
    border-color: transparent;
  }
}


@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes slideDown {
  from {
    transform: translateY(-50px);
  }
  to {
    transform: translateY(0);
  }
}

    .popupbtn {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    .popupbtn:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>


  <div class="map-container">

    <?php include 'partials/sidebar.php'; ?>

    <div id="popupTelegram" class="popup" role="dialog" aria-labelledby="popupTitle">
    <div class="popup-content">
      <h2 id="popupTitle">Welcome to SIA KAPUTAMA</h2>
      <div class="popup1">
        <p id="typingText">Di sini, kamu dapat mengakses berbagai informasi akademik seperti nilai tugas harian, jadwal kuliah, dan pengumuman penting lainnya. Pastikan kamu bergabung dengan grup Telegram Prodi untuk mendapatkan update terkini.</p>
      </div>
      <button class="popupbtn" id="closePopup">Tutup</button>
    </div>
  </div>


    <!-- Konten utama -->
    <div class="map-content">
      <div class="icon-container">
        <a href="https://www.youtube.com/@stmikkaputama"><i class='bx bxl-youtube'></i></a>
        <a href="https://www.facebook.com/STMIKKaputama/" target="_blank"><i class='bx bxl-facebook'></i></a>
        <a href="https://www.instagram.com/stmikkaputama_official/" target="_blank"><i class='bx bxl-instagram'></i></a>
        <a href="https://www.linkedin.com/company/stmik-kaputama/?originalSubdomain=id" target="_blank"><i class='bx bxl-linkedin-square'></i></a>
        <a href="https://akupintar.id/universitas/-/kampus/detail-kampus/stmik-kaputama/profil" target="_blank"><i class='bx bxs-graduation'></i></a>
        <a href="https://www.tiktok.com/@stmikkaputama" target="_blank"><i class='bx bxl-tiktok'></i></a>
        <a href="https://www.tiktok.com/@stmikkaputama" target="_blank"><i class='bx bxl-whatsapp'></i></a>


      </div>

      <div class="perhatian">
        <p>Hai <span class="nama"><?php echo htmlspecialchars($_SESSION['username']); ?></span>, NPM Anda adalah <?php echo htmlspecialchars($_SESSION['npm']); ?>. Selamat datang di halaman User SIAK Kaputama. Silahkan klik menu pilihan .</p>
      </div>

      <div class="telegram">

        <div class="telegram1">
          <div class="icon-tele">
            <a href=""><i class='bx bxl-telegram'></i></a>
          </div>
          <h3>Group Telegram Prodi</h3>
          <p>Silahkan bergabung di group telegram melalui link dibawah ini</p>
          <div class="link-telegram">
            <a href="https://t.me/+gwkP7wbQPYY1MTA1">Bergabung group telegram </a>
          </div>
        </div>

        <div class="telegram1">
          <div class="icon-tele">
            <a href=""><i class='bx bxl-telegram'></i></a>
          </div>
          <h3>Group Telegram Konsultasi</h3>
          <p>Silahkan bergabung di group telegram melalui link dibawah ini</p>
          <div class="link-telegram">
            <a href="https://t.me/+eBOFfH-353thYzll">Bergabung group telegram </a>
          </div>
        </div>

        <div class="telegram1">
          <div class="icon-tele">
            <a href=""><i class='bx bxl-telegram'></i></a>
          </div>
          <h3>Group Telegram Job Center</h3>
          <p>Silahkan bergabung di group telegram melalui link dibawah ini</p>
          <div class="link-telegram">
            <a href="https://t.me/+9QmR5QdWLnMzNzE1">Bergabung group telegram </a>
          </div>
        </div>

      </div>

     
      <div class="kotak1">
        <h3>Absensi Kehadiran Perkuliahan</h3>
        <div class="link-kotak">
          <table>
            <thead>
              <tr>
                <th class="">#</th>
                <th>Kode MK</th>
                <th>Matakuliah</th>
                <th>Dosen</th>
                <?php for ($i = 1; $i <= 16; $i++): ?>
  <th>Ke-<?php echo $i; ?></th>
<?php endfor; ?>
<th>Total</th>
</tr>
</thead>
<tbody>
  <?php foreach ($absensi as $index => $data): ?>
    <tr>
      <td class="id"><?php echo $index + 1; ?></td>
      <td class="kiri"><?php echo htmlspecialchars($data['kode_mk']); ?></td>
      <td class="kiri"><?php echo htmlspecialchars($data['matakuliah']); ?></td>
      <td class="kiri"><?php echo htmlspecialchars($data['dosen']); ?></td>
      <?php foreach ($data['kehadiran'] as $kehadiran): ?>
        <td class="ceklis"><?php echo $kehadiran ? '✓' : ''; ?></td>
      <?php endforeach; ?>
      <td><?php echo number_format(hitungTotalKehadiran($data['kehadiran']), 2); ?>%</td>
    </tr>
  <?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<?php include 'partials/footer.php'; ?>

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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var popup = document.getElementById('popupTelegram');
    var closeBtn = document.getElementById('closePopup');

    // Tampilkan popup
    popup.style.display = 'flex';

    // Tutup popup saat tombol "Tutup" diklik
    closeBtn.addEventListener('click', function () {
      popup.style.display = 'none';
    });
  });
</script>

<script>
    document.getElementById('closePopup').addEventListener('click', function() {
      document.getElementById('popupTelegram').style.display = 'none';
    });
    // Example to show popup for testing purposes
    document.getElementById('popupTelegram').style.display = 'flex';

    function typeWriter(elementId, text, speed) {
  let i = 0;
  const element = document.getElementById(elementId);
  element.innerHTML = ''; // Clear any existing text

  function typing() {
    if (i < text.length) {
      element.innerHTML += text.charAt(i);
      i++;
      setTimeout(typing, speed);
    }
  }

  typing();
}

// Trigger typing effect when the popup is shown
window.onload = function() {
  const textToType = "Di sini, kamu dapat mengakses berbagai informasi akademik seperti nilai tugas harian, jadwal kuliah, dan pengumuman penting lainnya. Pastikan kamu bergabung dengan grup Telegram Prodi untuk mendapatkan update terkini.";
  typeWriter("typingText", textToType, 100); // Adjust speed (in milliseconds)
}

  </script>



</body>

</html>