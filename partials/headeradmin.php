<?php

require 'config/database.php';


// fetch current user from database
if(isset($_SESSION['user-id'])){
    $id = filter_var(($_SESSION)['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kampus STMIK KAPUTAMA</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
</head>

<body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"

></script>

<script>
  AOS.init();
</script>
<nav>
    <div class="container nav__container">
        <a href="<?= ROOT_URL ?>" class="nav__logo"><img class="logo" src="images/logo.png" alt="">STMIK Kaputama</a>
        
        <div class="nav__menu" id="nav-menu">
        <ul class="nav__items">
        <li class="nav__dropdown">
            <a href="../blog.php" id="servicesDropdown" class="dropdown__toggle">Bloger</a>
        </li>
        
        
        <!--=============== DROPDOWN 1 ===============-->
            <li class="nav__dropdown">
            <div class="nav__link">Profile  <i class="ri-arrow-down-s-line dropdown__arrow"></i></div>
                <ul class="dropdown__menu">
                    <li><a href="../sejarah.php" class="dropdown__link"><i class="ri-chat-history-fill"></i> Sejarah Singkat</a></li>
                    <li><a href="../visi-misi.php" class="dropdown__link"><i class="ri-message-3-fill"></i> Visi Misi dan Tujuan</a></li>
                    <li><a href="../lambang.php" class="dropdown__link"><i class="ri-school-fill"></i> Lambang atau Logo STMIK Kaputama</a></li>
                    <li><a href="../lagukaputama.php" class="dropdown__link"><i class="ri-music-fill"></i> Hymne STMIK Kaputama</a></li>
                    <li><a href="../lagukaputama.php" class="dropdown__link"><i class="ri-music-2-fill"></i> Mars STMIK Kaputama</a></li>
                    <li><a href="../location.php" class="dropdown__link"><i class='bx bxs-map'></i> Location</a></li>
                </ul>
            </li>

            
        <!--=============== DROPDOWN 2 ===============-->

            <li class="nav__dropdown">
            <div class="nav__link">Prodi  <i class="ri-arrow-down-s-line dropdown__arrow"></i></div>
                <ul class="dropdown__menu">
                    <li><a href="../si.php" class="dropdown__link"><i class="ri-database-fill"></i> Sistem Informasi (S1)</a></li>
                    <li><a href="../ti.php" class="dropdown__link"><i class="ri-code-box-fill"></i> Teknik Informatika (S1)</a></li>
                    <li><a href="../mi.php" class="dropdown__link"><i class="ri-bar-chart-box-fill"></i> Manajemen Informatika</a></li>
                    <li><a href="../ka.php" class="dropdown__link"><i class="ri-computer-fill"></i> Komputerisasi Akuntansi</a></li>
                    <li><a href="../bd.php" class="dropdown__link"><i class="ri-smartphone-fill"></i> Bisnis Digital</a></li>
                </ul>
            </li>

            
        <!--=============== DROPDOWN 3 ===============-->

            <li class="nav__dropdown">
            <div class="nav__link">Platform  <i class="ri-arrow-down-s-line dropdown__arrow"></i></div> 
               <ul class="dropdown__menu">
                    <li><a href="../landing-page.php" class="dropdown__link"><i class="ri-shield-user-fill"></i> Sistem Informasi Akademik</a></li>
                    <li><a href="../elearning.php" class="dropdown__link"><i class="ri-macbook-fill"></i> E-Learning</a></li>
                    <li><a href="https://library.kaputama.ac.id/" class="dropdown__link"><i class="ri-book-3-fill"></i> E-Library</a></li>
                    <li><a href="https://jurnal.kaputama.ac.id/" class="dropdown__link"><i class="ri-survey-fill"></i> Penelitian</a></li>
                </ul>
            </li>



            
            <?php if(isset($_SESSION['user-id'])): ?>
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'images/' . $avatar['avatar']?>">
                    </div>
                    <ul>
                        <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] === true): ?>
                            <li><a href="<?= ROOT_URL?>admin/index.php">Dashboard</a></li>
                        <?php endif; ?>
                        <li><a href="<?= ROOT_URL?>logout.php">Logout</a></li>
                    </ul>
                </li>
            <?php else : ?>
                <li><a href="<?= ROOT_URL ?>signin.php">Signin</a></li>
            <?php endif ?>
        </ul>

        <button id="open__nav-btn" style="color: white;"><i class='bx bx-menu'></i></button>
        <button id="close__nav-btn" style="color: white;"><i class='bx bx-x'></i></button>
        </div>
    </div>
</nav>



