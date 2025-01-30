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
        <h1>Komputerisasi Akuntansi</h1>
        <div class="image">
          <img src="images/kaputamadepan.png" alt="Dio Abiyyu Zidane Ginting">
        </div>

      </div>
  </section>



  <section class="Project">

    <h2>Visi</h2>
    <p>
    “Menjadi program studi komputerisasi akuntansi yang unggul profesional,berkarakter, dan berjiwa entrepreneur dalam bidang akuntansi dan perpajakandi Sumatera Utara (tahun 2027), serta Indonesia (tahun 2037).”

</p>


  </section>
  <section class="Project2">

    <h2>Misi</h2>


    <p>1. Menyelenggarakan pendidikan yang berkualitas dalam bidang komputerisasi akuntansi serta penerapannya dalam akuntansi dan perpajakan.</p>

    <p>2. Menyelenggarakan penelitian yang berkualitas dibidang komputerisasi akuntansi yang mendukung keahlian technopreneur.

    </p>

    <p>3. Menyelenggarakan pengabdian kepada masyarakat yang bermanfaat bagi masyarakat.



    </p>

    <p>4. Membina kerjasama dengan pemerintah daerah, industri dan masyarakat dalam penerapan penelitian dan pengabdian masyarakat dalam bidang komputerisasi akuntansi.</p>


  </section>
  <section class="Project3">

    <h2>Tujuan</h2>


    <p>1. Menghasilkan lulusan yang berkompeten dalam bidang komputerisasi akuntansi terutama akuntansi dan Perpajakan serta penerapannya dalam dunia usaha.</p>

    <p>2. Menghasilkan riset dan karya inovatif sesuai kebutuhan masyarakat.</p>

    <p>3. Menghsilkan kegiatan-kegiatan yang bermanfaat bagi masyarakat.</p>

  </section>
  <section class="Project4">

    <h2>Profil Lulusan</h2>


    <p>1. Lulusan memiliki sikap bertanggungjawab atas pekerjaan di bidang keahliannya secara mandiri</p>

    <p>2. Lulusan mampu berkomunikasi secara efektif dalam berbagai konteks profesional</p>

    <p>3. Lulusan memiliki kemampuan menerapkan sistem aplikasi dengan menggunakan metode dan teknik yang sesuai dengan proses bisnis lingkungan sistem informasi akuntansi</p>

    <p>4. Lulusan mampu menciptakan peluang usaha dalam bidang bisnis serta kegiatan administrasi keuangan</p>
    <p>5. Lulusan menguasai konsep umum sistem informasi akuntansi, manajemen data/informasi, dan pengembangan sistem informasi untuk memberi solusi berbasis computing dalam lingkungan sistem informasi akuntansi

</p>

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