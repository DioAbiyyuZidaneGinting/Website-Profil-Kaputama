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

  .text h1 {
    margin-top: 5%;
    font-family: 'Abang', sans-serif;
    font-size: 40px;
    text-align: center;
    color: #171717;
    white-space: nowrap; /* Mencegah teks membungkus ke baris baru */
    text-overflow: ellipsis; /* Menambahkan elipsis jika teks terlalu panjang */
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
    height: 30vh;
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
    height: 70vh;
    padding: 30px 0; 
    font-style: normal;
    font-weight: 400;
    border-left:  3px solid black;
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
    border-right:  3px solid black;
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
    padding: 0 0 10px 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }
  .Project3 p{
    padding: 0 0 10px 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }
  .Project4 p{
    padding: 0 0 10px 30px;
    color: #333;
    font-size: 20px;
    text-align: justify;
  }

  .Project2 h2{
    text-align: end;
  }
  .Project4 h2{
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
    border-right:  3px solid black;
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
    border-right:  3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);
  }

  .Project4 {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 90vh;
    padding: 30px 0; 
    font-style: normal;
    font-weight: 400;

    border-top: 2px dashed rgb(0, 0, 0);
  }


  .Project2 p{
    padding: 10px;
    color: #171717;
    font-size: 15px;
    text-align: justify;
  }
  .Project3 p{
    padding: 10px;
    color: #171717;
    font-size: 15px;
    text-align: justify;
  }

  .Project4 p{
    padding: 10px;
    color: #171717;
    font-size: 15px;
    text-align: justify;
  }

  .Project2{
    height: 85vh;
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

    .text h1 {
    margin-top: 5%;
    font-family: 'Abang', sans-serif;
    font-size: 30px;
    text-align: center;
    color: #171717;
    white-space: nowrap; /* Mencegah teks membungkus ke baris baru */
    text-overflow: ellipsis; /* Menambahkan elipsis jika teks terlalu panjang */
}


}

  
</style>
<body>


  <section class="service">
    <div class="content center-content">
      <div class="text">
<h1>Sistem Informasi</h1>
      <div class="image">
    <img src="images/kaputamadepan.png" alt="Dio Abiyyu Zidane Ginting">
</div>

    </div>
  </section>



  <section class="Project">

  <h2>Visi</h2>
    <p>
    “Menjadi program studi yang unggul, berkompeten, berkarakter dan berjiwa entrepreneur secara global dalam bidang sistem informasi serta penerapannya terutama dalam bidang bisnis cerdas di Sumatera Utara (Tahun 2027), serta Indonesia (Tahun 2037)”
    </p>


  </section>
  <section class="Project2">

  <h2>Misi</h2>
    
    
  <p>1. Menyelenggarakan pendidikan yang berkualitas dalam bidang sistem informasi serta penerapannya terutama dalam mewujudkan bisnis cerdas.</p>

        <p>2. Melaksanakan dan meningkatkan kualitas dan kuantitas penelitian dalam bidang sistem informasi cerdas yang mendukung bisnis cerdas.</p>

        <p>3. Melaksanakan pengabdian masyarakat yang bermanfaat bagi masyarakat.

</p>

        <p>4. Membina kerjasama dengan pemerintah daerah, industri dan masyarakat dalam hal penerapan penelitian dan pengabdian masyarakat terkait bisnis cerdas.</p>


  </section>
  <section class="Project3">

  <h2>Tujuan</h2>
    
    
  <p>1. Menghasilkan lulusan yang unggul, profesional, berkarakter, dan berjiwa enterpreneur di bidang sistem informasi.</p>

        <p>2. Menghasilkan riset dan karya inovatif yang unggul dan dapat dipublikasikan serta mendapatkan dana riset.</p>

        <p>3. Menghasilkan kegiatan-kegiatan yang bermanfaat bagi masyarakat</p>

        <p>4. Terjalinnya kerja sama dengan pemerintah daerah, industri dan masyarakat dalam hal penerapan bisnis cerdas, data scientist, penelitian dan pengabdian masyarakat.</p>

  </section>
  <section class="Project4">

  <h2>Profil Lulusan</h2>
    
    
  <p>1. Lulusan memiliki kemampuan dalam menganalisis, merancang, membuat, dan melakukan evaluasi sistem informasi yang selaras dengan tujuan organisasi (IS2020)</p>

        <p>2. Lulusan memiliki kemampuan dalam memahami, menerapkan dan mengintegrasikan model sistem, menggunakan metode dan berbagai teknik peningkatan bisnis proses yang mendatangkan suatu nilai untuk organisasi (IS2020)</p>

        <p>3. Lulusan Memiliki ketaqwaan kepada Tuhan Yang Maha Esa, etika profesionalitas, integritas, jujur, bertanggung jawab dan memiliki kecerdasan atas pekerjaannya di bidalng keahliannya</p>

        <p>4. Lulusan Memiliki Kemampuan teamwork, kepemimpinan, komunikasi, koloborasi dalam merancang dan menghasilkan inovasi dalam bidang kewirausahaan dan bisnis yang berbasis sistem informasi</p>
        <p>4. Lulusan Memiliki kemampuan dalam menggunakan teknologi informasi dan komunikasi untuk menjalankan bisnis cerdas</p>

  </section>


</body>

</html>

<?php
include 'partials/footer.php';
?>