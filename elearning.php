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
    


    .kotak{
        width: 50%;
        padding: 20px;
        background-color: transparent;  
        border: solid 1px #333;
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
        margin: 50px auto;
    }

    .kotak a i{
        font-size: 40px;
        padding: 5px;
        border-radius: 30px;
        margin-right: 20px;
    }


    .content {
    display: flex; 
    align-items: center; 
    }

    

    /* Media Query untuk layar kecil */
    @media screen and (max-width: 600px) {
      iframe {
        height: 300px; /
      }
    }
  </style>
</head>
<body>
  <h1>E-Learning:</h1>

        <div class="kotak">
            <a href="">
                <div class="content">
                <a href="https://e-learning.kaputama.ac.id/mod/url/view.php?id=7"><i style=' background-color:#fff;' class='bx bx-news'></i></a>
                    <span>Login Ke LMS</span>
                </div>
            </a>
        </div>
        <div class="kotak">
            <a href="">
                <div class="content">
                <a href="https://pmb.kaputama.ac.id/"><i style=' background-color:#fff;' class='bx bxs-id-card'></i></a>
                    <span>PMB</span>
                </div>
            </a>
        </div>
        <div class="kotak">
            <a href="">
                <div class="content">
                <a href="https://www.youtube.com/@stmikkaputama"><i class='bx bxl-youtube' style='color:#ec0707; background-color:#fff;' class="youtube"></i></a>
                    <span>Youtube KAPUTAMA</span>
                </div>
            </a>
        </div>


        <div class="kotak">
            <a href="">
                <div class="content">
                <a href="https://www.instagram.com/stmikkaputama_official/"><i class='bx bxl-instagram' style="color: #fff; background: linear-gradient(45deg, #FFFF00, #FFA500,rgb(255, 0, 128), #9370DB, #4B0082); border-radius: 50%;"></i></a>
                <span>Instagram KAPUTAMA</span>
                </div>
            </a>
        </div>


       
</body>
</html>

    <?php
include 'partials/footer.php';
?>