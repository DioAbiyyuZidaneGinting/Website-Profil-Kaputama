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
    height: 60vh;
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

  .Project2 h2{
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
    height: 40vh;
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
<h1>Visi Misi & Tujuan</h1>
      <div class="image">
    <img src="images/kaputamadepan.png" alt="Dio Abiyyu Zidane Ginting">
</div>

    </div>
  </section>



  <section class="Project">

  <h2>Visi</h2>
    <p>
    Menjadi perguruan tinggi bidang teknologi informasi yang unggul, profesional, berkarakter, dan berjiwa entrepreneur di Sumatera Utara (Tahun 2027), serta Indonesia (Tahun 2037)
    </p>


  </section>
  <section class="Project2">

  <h2>Misi</h2>
    
    
  <p>1. Menyelenggarakan manajemen pendidikan yang bermutu tinggi</p>

        <p>2. Menyelenggarakan pendidikan yang unggul, profesional, berkarakter, dan berjiwa entrepreneur di bidang teknologi informasi</p>

        <p>3. Menyelenggarakan pendidikan di bidang teknologi informasi berstandar nasional</p>

        <p>4. Menyelenggarakan penelitian yang berkualitas di bidang teknologi informasi</p>

        <p>5. Menyelenggarakan layanan pengabdian kepada masyarakat yang profesional di bidang teknologi informa </p>   

  </section>
  <section class="Project3">

  <h2>Tujuan</h2>
    
    
  <p>1. Menghasilkan mutu pelayanan yang prima bagi kepuasan stakeholder berdasarkan standar manajemen mutu perguruan tinggi</p>

        <p>2. Menghasilkan lulusan yang unggul, profesional, berkarakter, dan berjiwa entrepreneur di bidang teknologi informasi</p>

        <p>3. Menghasilkan mutu pendidikan yang berkualitas melalui hubungan kemitraan Regional, Nasional, dan Internasional</p>

        <p>4. Menghasilkan produk dan inovasi yang berkualitas, untuk meningkatkan daya saing di bidang teknologi informasi</p>

        <p>5. Menghasilkan solusi yang tepat dan nyata, untuk memecahkan permasalahan di masyarakat dalam bidang teknologi informasi </p>   

  </section>


</body>

</html>

<?php
include 'partials/footer.php';
?>