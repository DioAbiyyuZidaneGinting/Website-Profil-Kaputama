<?php
// Simpan informasi pengguna yang telah login di session dengan waktu habis tertentu
$_SESSION['loggedin'] = true;
$_SESSION['login_time'] = time();

// Periksa apakah session pengguna sudah ada dan waktu habis belum tercapai
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || time() - $_SESSION['login_time'] > 3600) {
  header('Location: login-sia.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Peta STMIK Kaputama</title>

  <style>
    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      line-height: 1.6;
      color: var(--color-gray-200);
    }

    .map-container {
      display: flex;

    }

    aside {
      margin-top: -20px;
      width: 250px;
      background-color: #f4f4f4;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      height: 100vh;
      position: relative;
      overflow-y: auto;
      /* Tambahkan ini */
      transition: left 0.3s ease;
      padding-bottom: 60px;

    }



    aside.active {
      left: 0;
    }

    aside ul {
      list-style: none;
      padding: 0;
    }

    aside ul li {
      margin: 15px 0;
    }

    aside ul li a {
      text-decoration: none;
      color: #333;
      font-weight: bold;
    }

    aside ul li a:hover {
      text-decoration: underline;
    }

    .sidebar__toogle {
      display: inline-block;
      background: var(--color-primary-varian);
      color: var(--color-white);
      position: fixed;
      left: 0;
      bottom: 4rem;
      z-index: 1;
      width: 2.5rem;
      height: 2.5rem;
      border-radius: 0 50% 50% 0;
      font-size: 1.3rem;
      cursor: pointer;
      box-shadow: 1rem 0 2rem rgba(0, 0, 0, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .map-content {
      flex-grow: 1;
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    .icon-container {
      margin-top: 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 20px;
    }

    .icon-container a {
      background: var(--color-bg);
      border-radius: 50%;
      width: 2.3rem;
      height: 2.3rem;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 10px;
      font-size: 20px;
    }

    .icon-container a:hover {
      background: var(--color-white);
      color: var(--color-bg);
    }

    .perhatian {
      padding: 15px;
      background-color: rgba(24, 23, 56, 0.4);
      text-align: start;
      border: 2px solid #181738;
      color: #181738;
      border-radius: 20px;
    }

    .nama {
      font-weight: bold;
    }

    .telegram {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .telegram1 {
      padding: 20px 0 20px 0;
      text-align: center;
      border: 2px solid #181738;
      color: #181738;
      border-radius: 20px;
      width: 330px;
    }

    .telegram1 a {
      margin-top: 20px;
      text-align: center;
      justify-content: center;
      align-items: center;
    }

    .link-telegram {
      border-top: 1px solid #181738;
      width: 100%;
      margin-top: 50px;
      padding: 20px 0 15px 0;
    }

    .icon-tele {
      font-size: 40px;
    }

    .profile-picture {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      margin-top: 5px;
    }

    .profile-section {
      display: flex;
      align-items: center;
      padding: 10px 0;
    }


    .username {
      font-weight: bold;
      color: #333;
    }

    .logout-link {
      display: block;
      margin-top: 20px;
      text-align: center;
      color: #ff0000;
      text-decoration: none;
      font-weight: bold;
    }

    .logout-link:hover {
      text-decoration: none;
      background-color: #ff0000;
      color: #f4f4f4;
    }



    /* Tambahkan kode ini untuk membuat sidebar tersembunyi pada layar dengan lebar kurang dari 600px */
    @media (max-width: 600px) {
      aside {
        margin-top: -10px;
        position: fixed;
        left: -250px;
      }

      aside.active {
        left: 0;
      }

      #show__sidebar-btn {
        display: block;
      }

      #hide__sidebar-btn {
        display: none;
      }
    }

    @media (min-width: 601px) {
      aside {
        left: 0;
      }

      #show__sidebar-btn {
        display: none;
      }

      #hide__sidebar-btn {
        display: none;
      }
    }
  </style>
</head>

<body>


  <div class="map-container">
    <!-- Tombol toggle untuk sidebar -->
    <button id="show__sidebar-btn" class="sidebar__toogle"><i class='bx bx-chevron-right'></i></button>
    <button id="hide__sidebar-btn" class="sidebar__toogle"><i class='bx bx-chevron-left'></i></button>
    <!-- Sidebar -->
    <aside id="sidebar">
      <div class="profile-section">
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
          if (isset($_SESSION['username'])) {
            // Mengambil data berdasarkan username yang ada di session
            $pdo = new PDO('mysql:host=localhost;dbname=kaputama', 'root', '');
            $stmt = $pdo->prepare('SELECT profile_picture, username, role, nia FROM admin WHERE username = ?');
            $stmt->execute([$_SESSION['username']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
              // Menampilkan foto profil, username, dan nidn dosen
              echo '<div class="profile-section">';
              echo '<img src="' . htmlspecialchars($user['profile_picture']) . '" alt="Foto Profil" class="profile-picture">';
              echo '<div>';
              echo '<span class="username">' . htmlspecialchars($user['username']) . '</span><br>';
              echo '<span class="nia">NIA: ' . htmlspecialchars($user['nia']) . '</span>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            // Jika tidak ada data di session
            echo 'Error: Tidak ada data yang disimpan di session dengan key "username"';
          }
        }
        ?>

      </div>

      <ul>
        <li><a href="admin-sia.php"><i class='bx bx-home'></i>Dashboard</a></li>

        <li><a href="account-admin.php"><i class='bx bxs-user'></i>Account</a></li>
        <li><a href="tambahpengguna.html"><i class='bx bx-user-plus'></i>Add User</a></li>
        <li><a href="add-prodi.html"><i class='bx bxs-book-add'></i>Add Program Studi</a></li>
        <li><a href="admin-jadwal.php"><i class='bx bx-calendar'></i>Atur Jadwal Dosen</a></li>
        


        <li><a href="logoutsia.php"><i class='bx bx-log-out'></i>Logout</a></li>
      </ul>
    </aside>
  </div>

  <!-- Tambahkan script untuk toggle sidebar -->
  <script>
    const showSidebarBtn = document.getElementById('show__sidebar-btn');
    const hideSidebarBtn = document.getElementById('hide__sidebar-btn');
    const sidebar = document.getElementById('sidebar');

    showSidebarBtn.addEventListener('click', () => {
      sidebar.classList.add('active');
    });

    hideSidebarBtn.addEventListener('click', () => {
      sidebar.classList.remove('active');
    });
  </script>
</body>

</html>