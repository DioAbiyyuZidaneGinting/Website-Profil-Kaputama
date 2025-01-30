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
  * {
    margin: 0;
    padding: 0;
  }

  body {
    min-height: 150vh;
    background-color: rgb(192, 192, 192);
    background-size: cover;

  }




  .service {
    margin-top: 0px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 70vh;
    /* Pastikan ini cukup tinggi */
    padding: 0;
    /* Hapus padding untuk memusatkan gambar */
    display: flex;
    /* Menggunakan flexbox */
    justify-content: center;
    /* Memusatkan secara horizontal */
    align-items: center;
    /* Memusatkan secara vertikal */
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

  .text h1,
  .text h2,
  .text h3 {
    margin: 0;
    color: white;
    margin-top: 10px;
  }

  .text h1 {
    margin-top: 5%;
    font-family: 'Abang', sans-serif;
    font-size: 40px;
    text-align: center;
    color: #171717;
    white-space: nowrap;
    /* Mencegah teks membungkus ke baris baru */
    text-overflow: ellipsis;
    /* Menambahkan elipsis jika teks terlalu panjang */
  }


  .image {
    display: flex;
    /* Menggunakan flexbox */
    justify-content: center;
    /* Memusatkan secara horizontal */
    align-items: center;
    /* Memusatkan secara vertikal */
    margin: 30px 0;
    /* Mengatur margin atas dan bawah */
  }

  .image img {
    border-radius: 20%;
    width: 250px;
    height: 250px;
    object-fit: cover;
    transition: box-shadow 0.3s ease;
  }

  .image img:hover {
    box-shadow: 0 4px 20px rgba(11, 11, 11, 0.7);
    /* Efek box shadow saat di-hover */
  }

  .Project {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 30vh;
    padding: 30px 0;
    font-style: normal;
    font-weight: 400;
    border-right: 3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);
  }

  .Project2 {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 70vh;
    padding: 30px 0;
    font-style: normal;
    font-weight: 400;
    border-left: 3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);

  }

  .Project3 {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 60vh;
    padding: 30px 0;
    font-style: normal;
    font-weight: 400;
    border-right: 3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);
  }

  .Project4 {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 60vh;
    padding: 30px 0;
    font-style: normal;
    font-weight: 400;
    border-left: 3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);
  }
  .Project5 {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 60vh;
    padding: 30px 0;
    font-style: normal;
    font-weight: 400;
    border-right: 3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);
  }

  .Project p {
    padding: 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }

  .Project2 p {
    padding: 0 0 10px 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }

  .Project3 p {
    padding: 0 0 10px 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }

  .Project4 p {
    padding: 0 0 10px 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }
  .Project5 p {
    padding: 0 0 10px 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }

  .Project2 h2 {
    text-align: end;
  }

  .Project4 h2 {
    text-align: end;
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
      height: 70vh;
      padding: 30px 0;
      font-style: normal;
      font-weight: 400;
      margin-bottom: 10px;
      border-right: 3px solid black;
      border-top: 2px dashed black;
      color: #171717;

    }

    .Project2 {
      margin-top: -10px;
      background-color: rgb(192, 192, 192);
      margin-left: 5%;
      width: 90%;
      height: 100vh;
      padding: 30px 0;
      font-style: normal;
      font-weight: 400;
      margin-bottom: 10px;

      border-top: 2px dashed black;
      color: #171717;

    }

    .Project3 {
      margin-top: -10px;
      background-color: rgb(192, 192, 192);
      margin-left: 5%;
      width: 90%;
      height: 90vh;
      padding: 30px 0;
      font-style: normal;
      font-weight: 400;
      border-right: 3px solid black;
      border-top: 2px dashed rgb(0, 0, 0);
    }

    .Project4 {
      margin-top: -10px;
      background-color: rgb(192, 192, 192);
      margin-left: 5%;
      width: 90%;
      height: 100%;
      padding: 30px 0;
      font-style: normal;
      font-weight: 400;
      border-top: 2px dashed rgb(0, 0, 0);
    }
    .Project5 {
      margin-top: -10px;
      background-color: rgb(192, 192, 192);
      margin-left: 5%;
      width: 90%;
      height: 100%;
      padding: 30px 0;
      font-style: normal;
      font-weight: 400;
      border-top: 2px dashed rgb(0, 0, 0);
    }


    .Project2 p {
      padding: 10px;
      color: #171717;
      font-size: 15px;
      text-align: justify;
    }

    .Project3 p {
      padding: 10px;
      color: #171717;
      font-size: 15px;
      text-align: justify;
    }

    .Project4 p {
      padding: 10px;
      color: #171717;
      font-size: 15px;
      text-align: justify;
    }
    .Project5 p {
      padding: 10px;
      color: #171717;
      font-size: 15px;
      text-align: justify;
    }

    .Project2 {
      height: 85vh;
    }

    .Project p {
      padding: 10px;
      color: #171717;
      font-size: 15px;
      text-align: justify;
    }

    .image img {
      width: 150px;
      /* Sesuaikan ukuran gambar */
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

    .text h1 {
      margin-top: 5%;
      font-family: 'Abang', sans-serif;
      font-size: 30px;
      text-align: center;
      color: #171717;
      white-space: nowrap;
      /* Mencegah teks membungkus ke baris baru */
      text-overflow: ellipsis;
      /* Menambahkan elipsis jika teks terlalu panjang */
    }


  }
</style>

<body>


  <section class="service">
    <div class="content center-content">
      <div class="text">
        <h1>Teknik Informasi</h1>
        <div class="image">
          <img src="images/kaputamadepan.png" alt="Dio Abiyyu Zidane Ginting">
        </div>

      </div>
  </section>



  <section class="Project">

    <h2>Visi</h2>
    <p>
      “Menjadi program studi teknik informatika yang unggul dan berkompeten,berkarakter dan berjiwa entrepreneur dalam bidang ICT dan riset secara global serta penerapannya dalam jaringan, robotic, multimedia, mobile, dan aplikasi cerdas terutama bidang kontrol cerdas di Sumatera Utara (tahun 2022), serta Indonesia (tahun 2032).” </p>


  </section>
  <section class="Project2">

    <h2>Misi</h2>


    <p>1. Menyelenggarakan pendidikan yang berkualitas dalam bidang jaringan, robotic, multimedia, mobile, khususnya bidang kontrol cerdas.</p>

    <p>2. Melaksanakan dan meningkatkan kualitas dan kwantitas penelitian dosen.

    </p>

    <p>3. Melaksanakan pengabdian masyarakat dengan melibatkan mahasiswa.



    </p>

    <p>4. Membina kerjasama dengan pemerintah daerah dan masyarakat dalam hal penerapan ICT, penelitian dan pengabdian masyarakat.</p>


  </section>
  <section class="Project3">

    <h2>Tujuan</h2>


    <p>1. Menghasilkan lulusan yang kompeten dalam bidang informatika terutama kontrol cerdas dan penerapannya, berkarakter, berwawasan global dan wirausaha.</p>

    <p>2. Menghasilkan riset dan karya inovatif sesuai kebutuhan masyarakat.</p>

    <p>3. Terjalinnya kerja sama dengan pemerintah daerah, industri dan masyarakat dalam hal penerapan ICT, penelitian dan pengabdian masyarakat.</p>

  </section>
  <section class="Project4">

    <h2>Profil Lulusan</h2>


    <p>1. Lulusan mampu mengaplikasikan pengetahuan di area fungsi Programming and Software Development pada profesinya. (SKKNI)</p>

    <p>2. Lulusan memiliki kemampuan menganalisis persoalan computing serta menerapkan prinsip-prinsip computing dan disiplin ilmu relevan lainnya untuk mengidentifikasi solusi bagi organisasi. (Sumber : (IABEE))</p>

    <p>3. Lulusan memiliki kepatuhan terhadap aspek legal, aspek sosial budaya dan etika profesi. (SNDIKTI)</p>

    <p>4. Lulusan mampu memberikan petunjuk dalam memilih berbagai alternatif solusi secara mandiri dan kelompok.(SNDIKTI)</p>
    <p>5. Lulusan memiliki kemampuan mendesain, mengimplementasi dan mengevaluasi solusi berbasis computing yang memenuhi kebutuhan pengguna dengan pendekatan yang sesuai. (Sumber : (IABEE))</p>

  </section>
  <section class="Project5">

    <h2>Profesi</h2>


    <p>1. Lulusan mampu mengaplikasikan pengetahuan di area fungsi Programming and Software Development pada profesinya. (SKKNI)</p>

    <p>2. Lulusan memiliki kemampuan menganalisis persoalan computing serta menerapkan prinsip-prinsip computing dan disiplin ilmu relevan lainnya untuk mengidentifikasi solusi bagi organisasi. (Sumber : (IABEE))</p>

    <p>3. Lulusan memiliki kepatuhan terhadap aspek legal, aspek sosial budaya dan etika profesi. (SNDIKTI)</p>

    <p>4. Lulusan mampu memberikan petunjuk dalam memilih berbagai alternatif solusi secara mandiri dan kelompok.(SNDIKTI)</p>
    <p>5. Lulusan memiliki kemampuan mendesain, mengimplementasi dan mengevaluasi solusi berbasis computing yang memenuhi kebutuhan pengguna dengan pendekatan yang sesuai. (Sumber : (IABEE))</p>

  </section>


</body>

</html>

<?php
include 'partials/footer.php';
?>