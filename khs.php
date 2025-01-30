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

        .table-container {
            width: 100%;
            overflow-x: auto;
            /* Allow horizontal scrolling */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: none;
        }

        th,
        td {
            border-bottom: 1px solid #ddd;
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


        .table2 {
            width: 50%;
        }
        .table3 {
            width: 100%;
        }

        tfoot .footer {
            background-color: #f2f2f2;
            font-weight: bold;
            width: 60%;
        }

        tfoot td {
            font-weight: bold;
        }

        td {
            padding: 8px;
        }

        td:nth-child(1) {
            width: 3%;
        }

        td:nth-child(2) {
            width: 10%;
        }

        td:nth-child(3) {
            width: 30%;
        }

        td:nth-child(4) {
            width: 5%;
        }

        td:nth-child(5) {
            width: 10%;
        }

        td:nth-child(6) {
            width: 10%;
        }

        td:nth-child(7) {
            width: 7%;
        }

        td:nth-child(8) {
            width: 7%;
        }

        td:nth-child(9) {
            width: 5%;
        }

        td:nth-child(10) {
            width: 7%;
        }

        td:nth-child(11) {
            width: 10%;
        }

        .ckl {
            background-color: #333;
            color: red;
            padding: 10px;
            box-shadow: 3px 5px 10px black;
        }

        .ckl {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5em;
            border-radius: 25px;
            padding: 0.6em;
            border: none;
            outline: none;
            color: white;
            background-color: #171717;
            box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
        }

        .ckl:hover {
            background-color: red;
            color: white;
        }


        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .modal-body {
            padding: 20px 0;
        }

        .modal-footer {
            padding: 10px 0;
            border-top: 1px solid #ddd;
            text-align: right;
        }

        .modal-footer button {
            margin-left: 10px;
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
            color: rgb(255, 255, 255);
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

        .close2 {
            background-color: rgb(179, 0, 0);
            font-size: 15px;
            padding: 10px;
            color: #fff;
            border-radius: 10px;
        }

        .cekkhs {
            background-color: #0056b3;
            font-size: 15px;
            padding: 10px;
            color: #fff;
            border-radius: 10px;
        }

        .dp{
            background-color: yellow;
            padding: 10px;
        }

        @media (max-width: 600px) {
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                border: none;
            }

            .table2 {
            width: 100%;
        }

            th,
            td {
                border-bottom: 1px solid #ddd;
                padding: 5px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            tfoot th {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            tfoot td {
                font-weight: bold;
            }

            td {
                padding: 5px;
            }

            td:nth-child(1) {
                width: 10%;
            }

            td:nth-child(2) {
                width: 15%;
            }

            td:nth-child(3) {
                width: 30%;
            }

            td:nth-child(4) {
                width: 10%;
            }

            td:nth-child(5) {
                width: 10%;
            }

            td:nth-child(6) {
                width: 10%;
            }

            td:nth-child(7) {
                width: 10%;
            }

            td:nth-child(8) {
                width: 10%;
            }

            td:nth-child(9) {
                width: 10%;
            }

            td:nth-child(10) {
                width: 10%;
            }

            td:nth-child(11) {
                width: 10%;
            }

            .modal-content {
                width: 100%;
                /* Lebar modal 100% */
                padding: 20px;
                /* Padding 20px */
                margin: 10% auto;
                /* Margin yang lebih kecil */
            }
        }


        @media (max-width: 600px) {
            .sidebar {
                width: 100%;
                /* Sidebar menjadi 100% pada layar kecil */
                height: auto;
                position: relative;
            }

            .containerkrs {
                margin-left: 0;
                /* Hilangkan margin kiri pada layar kecil */
                margin-top: 100px;
            }

            .table-container {
                overflow-x: auto;
                /* Enable horizontal scrolling for small screens */
            }
        }
    </style>

</head>

<body>

    <div class="sidebar">
        <?php include 'partials/sidebar.php'; ?>
    </div>

    <div class="containerkrs">

        <button class="ckl" onclick="showPopup()">cek khs lampau</button>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2>Pilih Tahun Akademik</h2>
                </div>
                <div class="modal-body">
                    <form id="khsForm">
                        <label for="tahunAkademik">Tahun Akademik:</label>
                        <select id="tahunAkademik" name="tahunAkademik">
                            <option value="2023/2024">2024/2025</option>
                            <option value="2023/2024">2023/2024</option>
                            <option value="2022/2023">2022/2023</option>
                            <option value="2021/2022">2021/2022</option>
                        </select>

                        <label for="semester">Semester:</label>
                        <select id="semester" name="semester">
                            <option value="Gasal">Gasal</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="close2" onclick="closeModal()">Close</button>
                    <button class="cekkhs" onclick="cekKHS()">Cek KHS</button>
                </div>
            </div>
        </div>

        <h2>Kartu Hasil Studi (KHS)</h2>

  
        <table class="table3">
            <thead>
                <tr>
                    <th>NPM</th>
                    <td>:</td>
                    <td>23451039</td>
                </tr>
                <tr>
                    <th class="tahun">Tahun Akademik</th>
                    <td>:</td>
                    <td>2024/2025</td>
                </tr>
                <tr>
                    <th>Semester</th>       
                    <td>:</td>
                    <td>Gasal</td>
                </tr>
            </thead>
        </table>

        <div class="table-container">
        <table>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Kode MK</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Hadir</th>
                    <th>Tugas/Quiz</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>NH</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>MBRK45306</td>
                    <td>Teknik Riset Operasi</td>
                    <td>3</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td></td>
                    <td>0.00</td>
                    <td><button class="dp">Daftar Perbaikan</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>MBRK45303</td>
                    <td>Pemrograman Berorientasi Objek</td>
                    <td>3</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>80.00</td>
                    <td>0.00</td>
                    <td>E</td>
                    <td>34.00</td>
                    <td><button class="dp">Daftar Perbaikan</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>MBPS45305</td>
                    <td>Rekayasa Perangkat Lunak</td>
                    <td>3</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>70.00</td>
                    <td>0.00</td>
                    <td>E</td>
                    <td>21.00</td>
                    <td><button class="dp">Daftar Perbaikan</button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>MBPS45304</td>
                    <td>Pemrograman Web</td>
                    <td>3</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>95.00</td>
                    <td>0.00</td>
                    <td>E</td>
                    <td>38.50</td>
                    <td><button class="dp">Daftar Perbaikan</button></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>MBPS45302</td>
                    <td>Pemrograman Bergerak</td>
                    <td>3</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td>0.00</td>
                    <td></td>
                    <td>0.00</td>
                    <td><button class="dp">Daftar Perbaikan</button></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>MBPS45301</td>
                    <td>Jaringan Komputer</td>
                    <td>3</td>
                    <td>100.00</td>
                    <td>0.00</td>
                    <td>80.00</td>
                    <td>0.00</td>
                    <td>E</td>
                    <td>34.00</td>
                    <td><button class="dp">Daftar Perbaikan</button></td>
                </tr>
            </tbody>
        </table>
        </div>

        <table class="table2">
            <tfoot>
                <tr>
                    <th class="footer">Total SKS</th>
                    <td>18</td>
                </tr>
                <tr>
                    <th class="footer"> Jumlah Mata Kuliah</th>
                    <td>6</td>
                </tr>
                <tr>
                    <th class="footer">Index Prestasi</th>
                    <td>0,00</td>
                </tr>
            </tfoot>
        </table>
        <button id="cetak-khs" class="button" onclick="window.location.href='ckhs.php'">Cetak KRS</button>
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