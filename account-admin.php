<?php
session_start();



?>


<!DOCTYPE html>
<html lang="en">
<?php include 'partials/header.php'; ?>
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
        .ganjil{
            background-color: #ddd;
        }

        .editdata{
            background-color: red;
            padding: 7px;
            border-radius: 10px;
        }

        .editdata a{
            color: #f4f4f4;
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
    }
    .containerkrs h2{
        margin-top: -130px; 
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
        <?php include 'partials/sidebar-admin.php'; ?>
    </div>

    <div class="containerkrs">
        <h2>Account</h2>
        <div class="password" id="perhatian">
            <p>Ingin mengganti password? <a href="">Klik Disini</a></p>
        </div>

        <div class="table-container">
            <table class="table">
                <tbody>
                    <tr class="ganjil">
                        <td class="kiri"> NIA </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['nia']); ?></td>
                    </tr>
                    <tr>
                        <td class="kiri"> Nama Lengkap </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['full_name']); ?></td>
                    </tr>

                    <tr class="ganjil">
                        <td class="kiri"> No HP </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['no_telp']); ?></td>
                    </tr>
                    <tr>
                        <td class="kiri"> Jenis Kelamin </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['jenis_kelamin']); ?></td>
                    </tr>
                    <tr class="ganjil">
                        <td class="kiri"> Tempat Lahir </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['tempat_lahir']); ?></td>
                    </tr>
                    <tr>
                        <td class="kiri"> Tanggal Lahir </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['tanggal_lahir']); ?></td>
                    </tr>
                    <tr class="ganjil">
                        <td class="kiri"> Nama Ayah </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['nama_ayah']); ?></td>
                    </tr>
                    <tr>
                        <td class="kiri"> Nama Ibu </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['nama_ibu']); ?></td>
                    </tr>
                    <tr class="ganjil">
                        <td class="kiri"> Email </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['email']); ?></td>
                    </tr>
                    <tr>
                        <td class="kiri"> Alamat </td>
                        <td class="tengah"> : </td>
                        <td class="kanan"><?php echo htmlspecialchars($_SESSION['alamat']); ?></td>
                    </tr>


                   
                    <tr class="ganjil">
    <td class="kiri"> <button class="editdata"><a href="edit-admin.php?nia=<?php echo $_SESSION['nia']; ?>">Edit Data</a></button> </td>
    <td class="tengah">  </td>
    <td class="kanan"></td>
</tr>

                </tbody>
            </table>
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
    </div>
</body>

</html>