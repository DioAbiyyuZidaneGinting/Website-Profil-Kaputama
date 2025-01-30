<?php
session_start();
include 'partials/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org//face/abibas" type="text/css" />
  <link href="https://fonts.cdnfonts.com/css/sportsball" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/abang" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/cat-schmalfette-thannhaeuser" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/asbela-eternity" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/boba-cups" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/clab-personal-use" rel="stylesheet">

  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<style>
    

*{ 
    margin: 0;
    padding: 0;
}

body{
    min-height: 150vh;
    background-color:rgb(192, 192, 192);
    background-size: cover;

}




.service {
    margin-top: 0px;
    background-color:rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 70vh; /* Pastikan ini cukup tinggi */
    padding: 0; /* Hapus padding untuk memusatkan gambar */
    display: flex; /* Menggunakan flexbox */
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    border-left: 3px solid black;
}
  
  .content {
    display: flex;
    align-items: center;
  }
  
  .text {
    margin-right: 40px;
    margin-left: 15%;
  }
  
  .text h1, .text h2, .text h3 {
    margin: 0;
    color: white;
    margin-top: 10px;
  }

  .text h1{
    margin-top: 5%;
    font-family: 'Abang', sans-serif;
    font-size: 40px;   
    text-align: center;     
    color: #171717;                           
  }


  .image {
    display: flex; /* Menggunakan flexbox */
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    margin: 30px 0; /* Mengatur margin atas dan bawah */
}

.image img {
    border-radius: 20%;
    width: 250px;
    height: 250px;
    object-fit: cover;
    transition: box-shadow 0.3s ease; 
}

.image img:hover {
    box-shadow: 0 4px 20px rgba(11, 11, 11, 0.7); /* Efek box shadow saat di-hover */
}

  .Project {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 50vh;
    padding: 30px 0; 
    font-style: normal;
    font-weight: 400;
    border-right:  3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);
    
  }
  .Project2 {
    margin-top: -10px;
    background-color:rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 60vh;
    padding: 30px 0; 
    font-style: normal;
    font-weight: 400;
    border-left:  3px solid black;
    border-top: 2px dashed rgb(0, 0, 0); 
    
  }

  .Project p{
    padding: 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }
  .Project2 p{
    padding: 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }

/* Media Query untuk layar kecil */
@media screen and (max-width: 600px) {
    .service {
        width: 100%;
        padding: 50px 0;
        margin-top: 40px;
        height: 70vh;
    }

    .content {
        flex-direction: column;
        align-items: center;

    }

    .Project {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 100vh;
    padding: 30px 0; 
    font-style: normal;
    font-weight: 400;
    margin-bottom: 10px;
    border-right:  3px solid black;
    border-top: 2px dashed black;
    color: #171717;
    
  }

  .Project p{

    margin-bottom: -10px;
  }

  .Project2 p{
    padding: 10px;
    color: #171717;
    font-size: 15px;
    text-align: justify;
  }

  .Project2{
    height: 120vh;
  }

    .Project p{
    padding: 10px;
    color: #171717;
    font-size: 15px;
    text-align: justify;
  }

    .image img {
        width: 150px; /* Sesuaikan ukuran gambar */
        height: 150px;
        margin-top: 0;
    }

    .text {
        width: 90%;
        margin: 0;
        margin-bottom: 30px;
    }


    .text h1 {
        margin-top: 10px;
        text-align: center;
    }
}

  
</style>
<body>


  <section class="service">
    <div class="content center-content">
      <div class="text">
<h1>SEJARAH</h1>
      <div class="image">
    <img src="images//1734106672hero_STMIK KAPUTAMA.jpg" alt="Dio Abiyyu Zidane Ginting">
</div>

    </div>
  </section>



  <section class="Project">

    <p>Awal berdirinya STMIK Kaputama melalui pendirian Pusat Pendidikan Pelatihan Informatika Komputer dan Kewirausahaan (P3IK) Kaputama, yang merupakan sebuah lembaga pendidikan dan pelatihan yang dibawah naungan Yayasan Pendidikan Teknologi Informasi Mutiara (YPTIM) oleh Bapak Dr. Parlindungan Purba, SH., MM., (alm) dr. Maria Betty Sitanggang,SpK-K., Drs. Irwanto Tampubolon, M.Pd. dan Dra. Veronika Sitanggang, M.Psi. Kaputama merupakan singkatan dari Karya Putra Utama.
    </p>

    <p>STMIK Kaputama mendapat izin operasional dari Menteri Pendidikan Nasional RI dengan No. 09/D/O/2003 tanggal 31 Januari 2003 untuk mengelola program pendidikan Diploma 3 (D3) dan Strata 1 (S1) dengan jumlah program studi sebanyak 5 (lima) yaitu; Diploma 3: Manajemen Informatika, Komputerisasi Akuntansi dan Teknik Informatika, Strata 1 : Sistem Informasi dan Teknik Informatika.
    </p>

  </section>
  <section class="Project2">

    <p>Dalam perjalanannya terus membenahi diri untuk menjadi institusi yang unggul khususnya dalam bidang informatika dan komputer, dengan melaksanakan penerapan kurikulum pendidikan yang up to date yang sesuai dengan kebutuhan dunia kerja, melaksanakan proses belajar mengajar yang bermutu, mengadakan kerjasama dengan perguruan tinggi dan dunia industri, memberikan beasiswa kepada dosen untuk mengikuti program pendidikan S2 dan S3.

    </p>

    <p>STMIK Kaputama telah terakreditasi AIPT dengan nilai B oleh BAN-PT No:206/SK/BAN-PT/Akred/PT/2019, dan program studi Sistem Informasi telah Terakreditasi B oleh BAN-PT No:190/SK/BAN-PT/Akred/S/I/2018, Teknik Informatika telah Terakreditasi B oleh BAN-PT No:0908/SK/BAN-PT/Akred/S/VI/2016, Komputerisasi Akuntansi telah Terakreditasi B oleh BAN-PT No:2389/SK/BAN-PT/Ak-PPJ/Dipl-III/IV/2020, Manajemen Informatika telah Terakreditasi B oleh BAN-PT No:3534/SK/BAN-PT/Ak-PPJ/Dpl-III/VI/2020.

    </p>

  </section>


</body>

</html>

<?php
include 'partials/footer.php';
?>