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
      color: #333;
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

    iframe {
       
      max-width: 100%;
      height: 500px; 
      border: 0;
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
  <h1>Location:</h1>
  <div class="map-container">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.927645890983!2d98.47854787502074!3d3.60404109637006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3030d61f0edf3f19%3A0xd80779cd257bbaa4!2sSTMIK%20Kaputama!5e0!3m2!1sid!2sid!4v1734445134810!5m2!1sid!2sid" 
      width="800" 
      height="600" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</body>
</html>

    <?php
include 'partials/footer.php';
?>