<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Login dengan Animasi Card</title>
  <style>
      html, body {
        width: 100%;
            height: 100%;
            margin: 0;

        }


    /* Card itu sendiri */
    .card {

      width: 300px;
      height: 300px;
      position: relative;
      transform-style: preserve-3d;
      transform-origin: center;
      transition: transform 1s;
      cursor: pointer;
      margin: auto;
      padding: 20px;
      box-shadow: #333;
    }

    /* Efek ketika card berputar */
    .card.flipped {
      transform: rotateY(180deg);
    }

    /* Bagian depan card */
    .card .front, .card .back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      border: 1px solid #ccc;
      padding: 10px;
    }

    /* Gaya untuk bagian depan */
    .card .front {
        border-radius: 100px;
      background-color:rgb(0, 0, 0);
      width: 100%;
    }
    .card .back {
        border-radius: 100px;
        background-color:rgb(0, 0, 0);
        width: 100%;
    }





    /* Gaya tombol dan form */
    .card .back form, .card .front form {
      width: 100%;
      display: flex;
      flex-direction: column;

    }

    /* Gaya input dan label untuk username dan password */
    .card .front input {
      margin: 5px;
      padding: 10px;
      width: 100%;
      background-color: #333;
      border-radius: 30px;
      color: #f1f1f1;
    }

    .card .back input{
        margin: 5px;
      padding: 10px;
      width: 90%;
      background-color: #333;
      border-radius: 30px;
      color: #f1f1f1;
    }

    /* Gaya untuk bagian "Login" */
    .card .front h2 {
        color: #f1f1f1;
      margin-top: 0;
    }

    /* Menyusun username dan password bersebelahan */
    .card .front .input-group {      
        width: 90%;

    }


    
    /* Tombol untuk back di belakang card */
    .card .back button.back-btn {
      background-color: #f1f1f1;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      margin-top: 10px;
    }

    /* Gaya untuk tombol daftar */
    .card .front button {
      margin-top: 15px;
      padding: 10px 20px;
      cursor: pointer;
    }

    /* Tombol Login dan Back bersebelahan */
    .card .front .btn-group {
      display: flex;
      gap: 10px; /* Memberikan jarak antara tombol */
    }

    .card .front .btn-group button {
 
      cursor: pointer;
      width: 55%; /* Membuat tombol memiliki lebar hampir sama */
    }


        /* Gaya untuk bagian belakang, yang muncul setelah card berputar */
        .card .back {
      background-color: #d3d3d3;
      transform: rotateY(180deg);
    }

    ::placeholder{
        color: #ccc;
    }

    @media (max-width: 600px) {

        body{
            width: 100%;
        }
        .card .front{
            margin-top: 40%;
            margin-left: -30px;
        }
        .card .back {
       margin-left: -9.5%;
       margin-top: 40%;
        display: flex;
        justify-content: center; /* Memusatkan tombol dan form */
        align-items: center;
        flex-direction: column;
    }

    .card .back button.back-btn {
        margin-top: 10px;
        width: auto;
    }
    }
  </style>
</head>
<body>

    <div class="card" id="card">
      <!-- Bagian depan card -->
      <div class="front">
        <h2>Login</h2>
        <form action="authenticate.php" method="post">
          <div class="input-group">
            <label for="username">
            <input type="text" id="username" name="username" placeholder="Username:" required></label>
          </div>
          <div class="input-group">
            <label for="password">
            <input type="password" id="password" name="password" placeholder="Password:" required></label>
          </div>
          
          <!-- Tombol Login dan Back bersebelahan -->
          <div class="btn-group">
            <button type="submit">Login</button>
            <button type="button" onclick="flipCard()">Back</button>
          </div>
        </form>
      </div>

      <!-- Bagian belakang card yang muncul setelah berputar -->
      <div class="back">
        <form action="pin.php" method="post">
          <label for="pin">
          <input type="password" id="pin" name="pin" required placeholder="Masukkan Pin"></label><br><br>
          <button type="submit">Submit</button>
        </form>
        <button class="back-btn" onclick="flipCard()">Back</button>
      </div>
    </div>


  <script>
    // Fungsi untuk membalikkan card
    function flipCard() {
      document.getElementById('card').classList.toggle('flipped');
    }
  </script>
</body>
</html>
