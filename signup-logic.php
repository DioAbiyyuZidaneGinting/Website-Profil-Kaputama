<?php 
session_start();
require 'config/database.php';



// get signup form data if signup button was clicked

if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    
    // validate input values
    if(!$firstname){
        $_SESSION['signup']= "Masukkan Nama Depan Anda";
    } elseif(!$lastname) {
        $_SESSION['signup']= "Masukkan Nama Belakang Anda";
    } elseif(!$username) {
        $_SESSION['signup']= "Masukkan Username Anda";
    } elseif(!$email) {
        $_SESSION['signup']= "Masukkan email yang valid";
    } elseif(strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup']= "Kata sandi harus terdiri dari 8 karakter atau lebih.";
    } elseif(!$avatar['name']) {
        $_SESSION['signup']= "Masukan Avatar Anda";
    } else {
        //Periksa apakah kata sandi tidak cocok
        if($createpassword !== $confirmpassword){
            $_SESSION['signup'] = "Kata Sandi tidak cocok";
        } else {
            // hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            // Periksa jika usernam atau email sudah ada dalam database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "Username or Email already exist";
            } else {
                // WORK ON AVATAR
                //rename avatar
                $time = time(); //Buat setiap nama gambar unik dengan menggunakan waktu saat ini.
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                //pastikan file nya gambar
                $allowed_files = ['png','jpg','jpeg'];
                $extention = explode('.',$avatar_name);
                $extention = end($extention);
                if(in_array($extention, $allowed_files)){
                    //pastikan ukuran gambar gak terlalu besar(1mb)
                    if($avatar['size'] < 1000000){
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "File Size too big. Should be less then 1mb";
                    }
                } else {
                    $_SESSION['signup'] = "File Should be png, jpg, or jpeg";
                }
            }
        }
    }
  
    // redirect balik to signup page jika terjadi masalah
    if(isset($_SESSION['signup'])){
        //pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        // masukan pengguna baru ke dalam tabel users
        $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname',
        username='$username', email='$email', password='$hashed_password', avatar='$avatar_name',
        is_admin=0";
        $insert_user_result = mysqli_query($connection, $insert_user_query);


        if(!mysqli_errno($connection)){
            //redirect to login page with success message

            $_SESSION['signup-success'] = "Registration successful. Please Log In";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }

} else {
    // jika button gak di klik maka balik ke signup page
    header('location: ' . ROOT_URL . 'signup.php');
    die();

}