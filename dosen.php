<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login-sia.php');
    exit;
  }
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

        th,
        td {
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

        #entriesPerPage {
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
        <?php include 'partials/sidebar-dosen.php'; ?>
    </div>

    <div class="containerkrs">

        <div class="telegram">

            <div id="popupTelegram" class="popup" role="dialog" aria-labelledby="popupTitle">
                <div class="popup-content">
                    <h2 id="popupTitle">Welcome to SIA KAPUTAMA </h2> <span class="nama"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
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
                    <p>Hai <span class="nama"><?php echo htmlspecialchars($_SESSION['username']); ?></span>, NIDN Anda adalah <?php echo htmlspecialchars($_SESSION['nidn']); ?>. Selamat datang di halaman Dosen SIA Kaputama. Silahkan klik menu pilihan .</p>
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
  const textToType = "Di sini, kamu dapat mengakses berbagai informasi akademik seperti menginput nilai mahasiswa, jadwal kuliah, dan pengumuman penting lainnya. Pastikan kamu bergabung dengan grup Dosen untuk mendapatkan update terkini.";
  typeWriter("typingText", textToType, 100); // Adjust speed (in milliseconds)
}
</script>


</body>

</html>