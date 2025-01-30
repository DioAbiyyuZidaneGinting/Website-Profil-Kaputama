

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
            height: 100vh;
            /* Agar body memenuhi layar */

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


        h2 {
            text-align: center;

        }

        .angket{
            padding: 20px;
        }

        .tahun{
            background-color: #f4f4f4;
            color: #333;
            border: 1px solid #333;
            width: 100%;
            margin-bottom: 10px;
        }



        @media (max-width: 600px) {
    .containerkrs {
        margin-left: 0;
        margin-top: 100px;
        width: 100%;
        
    }

    .angket {
        width: 100%;
        margin: 0 auto;
    }

    .tahun2 {
        width: 100%;
        margin: 0 auto;
    }
}

.pilih{
    background-color: orange;
    border: 1px solid #333;
    padding: 10px;
    color: #f4f4f4;
}
    </style>

</head>

<body>

    <div class="sidebar">
        <?php include 'partials/sidebar.php'; ?>
    </div>

    <div class="containerkrs">
    <div class="angket">
        <h3>Pilih Tahun Akademik dan Semester</h3>

        <div class="tahun2">
            <select name="" id="" class="tahun">
                <!-- Teks "Tahun Akademik" sebagai opsi yang dinonaktifkan -->
                <option value="" disabled selected>Tahun Akademik</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
            </select>
            <select name="" id="" class="tahun">
                <!-- Teks "Tahun Akademik" sebagai opsi yang dinonaktifkan -->
                <option value="" disabled selected>Semester</option>
                <option value="">Gasal</option>
                <option value="">Genap</option>
            </select>
            <button class="pilih">Pilih Periode</button>
        </div>
    </div>
</div>


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
                document.getElementById("perhatian").style.display = "none";
            }



            // Fungsi untuk menampilkan modal
            function showPopup() {
                document.getElementById('myModal').style.display = 'block';
            }

            // Fungsi untuk menutup modal
            function closeModal() {
                document.getElementById('myModal').style.display = 'none';
            }

            // Fungsi untuk mengecek KHS
            function cekKHS() {
                const tahunAkademik = document.getElementById('tahunAkademik').value;
                const semester = document.getElementById('semester').value;
                alert(`Memeriksa KHS untuk Tahun Akademik ${tahunAkademik} Semester ${semester}`);
                closeModal();
            }
            // Tutup modal jika pengguna mengklik di luar modal
            window.onclick = function(event) {
                const modal = document.getElementById('myModal');
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };
        </script>
        </script>
</body>

</html>