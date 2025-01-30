<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Sistem Informasi Akademik - Landing Page</title>
  <style>
    html,
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      background-color:rgb(47, 31, 31);
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      text-align: center;
      color: #f1f1f1;
    }

    .landing-box {
      background-color: #171717;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
    }

    h1 {
      margin-bottom: 20px;
    }

    p {
      margin-bottom: 30px;
      font-size: 18px;
    }

    .btn-start {
      padding: 10px 20px;
      background-color: #FF4900;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      color: white;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .btn-start:hover {
      background-color: #ff6b3d;
    }

  </style>
</head>

<body>

  <div class="container">
    <div class="landing-box">
      <h1>Selamat Datang di Sistem Informasi Akademik</h1>
      <p>Temukan semua informasi akademik di sini, mulai dari jadwal kuliah, nilai, hingga pengumuman penting.</p>
      <button class="btn-start" onclick="window.location.href='login-sia.php'">Masuk ke Sistem</button>
    </div>
  </div>

</body>

</html>
