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
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
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
    padding: 0 10px 10px 30px;
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
      height: 100%;
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
      font-size: 20px;
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
        <h1>Bisnis Digital</h1>
        <div class="image">
          <img src="images/kaputamadepan.png" alt="Dio Abiyyu Zidane Ginting">
        </div>

      </div>
  </section>



  <section class="Project">

    <h2>Visi</h2>
    <p>
    “Menjadi program studi yang unggul profesional, berkarakter, dan berjiwa entrepreneur yang berdaya saing global dalam bidang bisnis dan marketing digital untuk menunjang industri dan kebutuhan masyarakat.”

</p>


  </section>
  <section class="Project2">

    <h2>Misi</h2>


    <p>1. Menyelenggarakan pendidikan yang berkualitas dalam bidang bisnis dan marketing digital yang unggul, inovatif secara global sesuai dengan kebutuhan industri dan masyarakat.</p>

    <p>2. Meningkatkan kualitas dan kuantitas penelitian dan pengabdian yang inovatif sesuai kebutuhan industri dan masyarakat di bidang bisnis dan marketing digital.

    </p>

    <p>3. Mewujudkan kerja sama yang berkelanjutan di bidang pendidikan, penelitian, dan pengabdian kepada masyarakat untuk menunjang industri dan kebutuhan masyarakat di bidang bisnis dan marketing digital.
    </p>



  </section>
  <section class="Project3">

    <h2>Tujuan</h2>


    <p>1. Menghasilkan lulusan yang berkualitas dalam bidang bisnis dan marketing digital yang unggul, inovatif secara global sesuai dengan kebutuhan industri dan masyarakat.</p>

    <p>2. Menghasilkan penelitian, pengabdian bidang bisnis dan marketing digital yang inovatif sesuai kebutuhan industri dan masyarakat.</p>

    <p>3. Meningkatkan kuantitas dan kualitas kerja sama di bidang pendidikan, penelitian, dan pengabdian kepada masyarakat untuk menunjang industri dan kebutuhan masyarakat di bidang bisnis dan marketing digital.</p>

  </section>
  <section class="Project4">

    <h2>Profil Lulusan</h2>


    <p>1. Lulusan mampu memanfaatkan perkembangan teknologi mutakhir untuk dioptimalkan sebagai basis dalam mengembangkan pengembangan usaha.

</p>

    <p>2. Lulusan mampu mengidentifikasi masalah dan menemukan solusi berdasar atas data-data agar manajemen organisasi/ institusi/ lembaga di bidang bisnis digital dapat beroperasi dengan lebih efisien dan efektif, serta dapat mengembangkan bisnisnya.</p>

    <p>3. Lulusan mampu mengidentifikasi masalah dan menemukan solusi berdasar atas data-data agar manajemen organisasi/ institusi/ lembaga di bidang bisnis digital dapat beroperasi dengan lebih efisien dan efektif, serta dapat mengembangkan bisnisnya.</p>



  </section>
  <section class="Project5">

    <h2>Profesi</h2>


    <p>1. Wirausaha Bisnis Digital</p>

    <p>2. Konsultan bisnis digital</p>

    <p>3. Profesional pemasaran digital</p>
  </section>


</body>

</html>

<?php
include 'partials/footer.php';
?>