<?php
session_start();
include 'partials/header.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peta STMIK Kaputama</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
    line-height: 1.6;
    color: var(--color-gray-200);
    }

    h1{
        display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 100px;
      text-transform: uppercase;
      color: #fff;
      font-size: 5em;
      letter-spacing: 10px;
      text-shadow: 0 0 10px cyan,
      0 0 20px cyan,
      0 0 40px cyan,
      0 0 80px cyan;
    }

    .map-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 50px auto;
      
    }

    .gambar{
        padding: 10px;
        max-width: 800px; /* Mengatur lebar maksimum gambar */
        
    }

    .img{
        border: 2px solid #ff7b00;
        border-radius: 50px 50px 5px 5px;
    }

    .download {
    position: relative;
    display: flex;
    padding: 10px 20px;
    border-radius: 5px 5px 25px 25px;
    margin-top: 10px;
    background-color: #ffffff;
    color: black;
    text-decoration: none;
    font-weight: bold;
    cursor: pointer;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    z-index: 0;
}

.download span {
    position: relative;
    z-index: 1;
    transition: color 0.3s ease-in-out; 
}

.download:hover span {
    color: white;
}

.download::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 100%;
    background-color: #ff7b00;
    transition: width 0.3s ease-in-out;
    z-index: -1;
}

.download:hover::after {
    width: 100%;
}

.back-next {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: 20px;
  margin: 20px 30px;
}

    .btn-1 {
      padding: 10px 20px;
      margin: 0; 
    }

    .back-next .btn-1:nth-child(1) {
      justify-self: start; 
    }

    .back-next .btn-1:nth-child(2) {
      justify-self: center; 
    }
    .back-next .btn-1:nth-child(3) {
      justify-self: end; 
    }

    .btn-1 {
      padding: 10px 20px;
      background-color: #ff7b00;
      color: white;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      font-size: 15px;
      transition: all 0.3s ease-in-out;
    }

    .btn-1:hover {
      box-shadow: inset 10.5em 0 0 0 #fff, inset 10.5em 0 0 0 #fff;
      color: black; 
    }


    @media screen and (max-width:1024px){
     h1{

        font-size: 3em;
     }
    }


    /* Media Query untuk layar kecil */
    @media screen and (max-width: 600px) {

      h1{
        display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 100px;
      text-transform: uppercase;
      color: #fff;
      font-size: 1.2em;
      letter-spacing: 10px;
      text-shadow: 0 0 10px cyan,
      0 0 20px cyan,
      0 0 40px cyan,
      0 0 80px cyan;
    }

    .btn-1 {
      padding: 10px 20px;
      background-color: #ff7b00;
      color: white;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      font-size: 12px;
      transition: all 0.3s ease-in-out;
    }
    }
    

  </style>
</head>
<body>
  <h1>Pendaftaran Kuliah</h1>
    <div class="map-container">
      <div class="gambar">
        <img class="img" src="images/BrosurUangKuliah_2024_2025.jpg" alt="">
          <a href="images/BrosurUangKuliah_2024_2025.jpg" class="download" download="BrosurUangKuliah_2024_2025.jpg">
            <span>Download</span>
          </a>
      </div>
    </div>

    <div class="back-next">
    <button class="btn-1" onclick="Back()"><i class='bx bxs-chevron-left-circle'></i></button>
    <button class="btn-1" onclick="goHomeToBrosur()"><i class='bx bxs-home'></i></button>
      <button class="btn-1" onclick="Next()"><i class='bx bxs-chevron-right-circle'></i></button>
    </div>

    <?php
      include 'partials/footer.php';
    ?>

<script>
    function Back() {
    window.location.href = 'biayapendidikan.php';
  }

  function goHomeToBrosur() {
    window.location.href = 'index.php';
  }

  function Next() {
    window.location.href = 'syaratpendaftaran.php';
  }
</script>
</body>
</html>
