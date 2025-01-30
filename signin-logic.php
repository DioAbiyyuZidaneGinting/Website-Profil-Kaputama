<?php
session_start();
require 'config/database.php';

// Setelah berhasil mendapatkan pengguna dari database
if (password_verify($password, $db_password)) {
    $_SESSION['user-id'] = $user_record['id'];
    $_SESSION['user_is_admin'] = $user_record['is_admin'] == 1; // true jika admin, false jika author
    // ...
}

if (isset($_POST['submit'])) {
    // Get form data
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (!$username_email) {
        $_SESSION['signin'] = "Username atau Email diperlukan";
    } elseif (!$password) {
        $_SESSION['signin'] = "Password diperlukan";
    } else {
        // Ambil user dari database
        $fetch_user_query = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if (mysqli_num_rows($fetch_user_result) == 1) {
            // Ubah rekaman menjadi array asosiatif
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            // Bandingkan kata sandi formulir dengan kata sandi Database
            if (password_verify($password, $db_password)) {
                // Tetapkan sesi untuk kontrol akses
                $_SESSION['user-id'] =$user_record['id'];
                // Tetapkan sesi jika user adalah admin
                if($user_record['is_admin'] == 1){
                    $_SESSION['user_is_admin'] = true;
                }

                //log user in
                header('location: ' . ROOT_URL . 'index.php');
            } else {
                $_SESSION['signin'] = "Silahkan Perika Masukan Anda";
            }
            } else {
                $_SESSION['signin'] = "User tidak ditemukan";
        }
    }

    //jika ada masalah, arahkan kembali ke halaman masuk dengan data masuk
    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }
} else {
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}
