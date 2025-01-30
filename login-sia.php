<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Login dengan Animasi Card</title>
  <style>
    html,
    body {
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
    .card .front,
    .card .back {
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
      background-color: #6b9080;
      width: 100%;
      margin-top: 40%;
      margin-left: -30px;
    }

    .card .back {
  background-color: #6b9080;
  border-radius: 100px;
  width: 100%;
  margin-left: -9.5%;
  margin-top: 40%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}





    /* Gaya tombol dan form */
    .card .back form,
    .card .front form {
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
      border-radius:10px;
      color: #f1f1f1;
    }

    .card .back input {
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
    .card .back h2 {
      color: #f1f1f1;
      margin-top: 0;
      text-align: center;
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
      gap: 10px;
      /* Memberikan jarak antara tombol */
    }

    .card .front .btn-group button {

      cursor: pointer;
      width: 55%;
      /* Membuat tombol memiliki lebar hampir sama */
    }

    .card .back button {

      cursor: pointer;
      width: 100%;
      /* Membuat tombol memiliki lebar hampir sama */
    }



    .submit {

      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5em;
      border-radius: 25px;
      padding: 0.6em;
      border: none;
      outline: none;
      color: white;
      background-color: #171717;
      box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
    }

    .submit:hover {
      background-color: red;
      color: white;
    }

    .back-btn,
    .btn-group button{
      box-shadow: 2px 6px 5px rgba(0,172,224,1);
    }

    .back-btn,
    .btn-group button:active{
      box-shadow: 2px 3px 5px rgba(0,172,224,1);
      transform: translateY(5px);
    }



    /* Gaya untuk bagian belakang, yang muncul setelah card berputar */
    .card .back {

      transform: rotateY(180deg);
    }

    ::placeholder {
      color: #ccc;
    }

    @media (max-width: 600px) {

      body {
        width: 100%;
      }

      .card .front {
        margin-top: 40%;
        margin-left: -30px;
      }

      .card .back {
        margin-left: -9.5%;
        margin-top: 40%;
        display: flex;
        justify-content: center;
        /* Memusatkan tombol dan form */
        align-items: center;
        flex-direction: column;
      }

      .card .back button.back-btn {
        margin-top: 10px;
        width: auto;
        width: 100%;
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
        <h2>PIN</h2>
        <label for="pin">
          <input type="password" id="pin" name="pin" required placeholder="Masukkan Pin"></label><br><br>
        <button class="submit" type="submit">Submit</button>
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
