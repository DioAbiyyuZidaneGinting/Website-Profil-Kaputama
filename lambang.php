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
    width: 280px;
    height: 200px;
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
    height: 30vh;
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
    height: 30vh;
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
    height: 30vh;
    padding: 30px 10px; 
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
    padding: 0 10px 10px 30px;
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
    text-align: start;
    padding: 10px;
  }
  .Project h2{
    padding: 10px;
    text-align: start;
  }
  .Project3 h2{
    text-align: start;
    padding: 10px;

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

  .Project3 {
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
  .Project4 {
    margin-top: -10px;
    background-color: rgb(192, 192, 192);
    margin-left: 5%;
    width: 90%;
    height: 50vh;
    padding: 30px 10px; 
    font-style: normal;
    font-weight: 400;
    border-left:  3px solid black;
    border-top: 2px dashed rgb(0, 0, 0);
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
    font-size: 25px;
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
<h1>Lambang atau Logo</h1>
      <div class="image">
    <img src="images/logo.png" alt="Dio Abiyyu Zidane Ginting">
</div>

    </div>
  </section>



  <section class="Project">

  <h2>TOPI TOGA WARNA HITAM</h2>
    <p>
    Topi toga hitam melambangkan misi utama dalam menghasilkan alumni yang mencintai, menguasai, mengembangkan dan mengabdikan ilmu pengetahuannya.    </p>


  </section>
  <section class="Project2">

  <h2>ANAK TANGGA BERWARNA MERAH DAN KUNING KEEMASAN BERJUMLAH SEMBILAN BUAH</h2>
    
    
  <p>Anak tangga semakin ke atas semakin besar melambangkan penguasaan teknologi informasi secara berprogram dan meluas. Warna merah dan kuning keemasan melambangkan unsur keberanian dan kesuksesan/kejayaan. Sembilan buah anak tangga melambangkan jumlah pendiri awal STMIK Kaputama sebanyak 9 orang.</p>


  </section>
  <section class="Project3">

  <h2>POTONGAN BIDANG BERBENTUK HURUF ”K”</h2>
    
    
  <p>Melambangkan nama almamater, yakni KAPUTAMA yang merupakan kesatuan dari beberapa unsur pendukung pelaksanaan pendidikan.</p>


  </section>

  </section>
  <section class="Project4">

  <h2>BENTUK ELLIPS BERWARNA BIRU LANGIT</h2>
    
    
  <p>Melambangkan kebulatan tekad yang kuat untuk menguasai teknologi informasi tanpa batas ruang dan waktu.</p>


  </section>


</body>

</html>

<?php
include 'partials/footer.php';
?>