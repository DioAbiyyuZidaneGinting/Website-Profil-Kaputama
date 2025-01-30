<?php 
require 'config/database.php';

// Ensure connection is established before any operations
if(mysqli_connect_errno()){
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data if submit button was clicked
if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // Validate input values
    if(!$firstname){
        $_SESSION['add-user'] = "Masukkan Nama Depan Anda";
    } elseif(!$lastname) {
        $_SESSION['add-user'] = "Masukkan Nama Belakang Anda";
    } elseif(!$username) {
        $_SESSION['add-user'] = "Masukkan Username Anda";
    } elseif(!$email) {
        $_SESSION['add-user'] = "Masukkan email yang valid";
    } elseif(strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = "Kata sandi harus terdiri dari 8 karakter atau lebih.";
    } elseif(!$avatar['name']) {
        $_SESSION['add-user'] = "Masukan Avatar Anda";
    } else {
        // Check if passwords match
        if($createpassword !== $confirmpassword){
            $_SESSION['add-user'] = "Kata Sandi tidak cocok";
        } else {
            // Hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            // Check if username or email already exists in database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['add-user'] = "Username atau email sudah terdaftar";
            } else {
                // Process avatar upload
                $time = time(); // Unique name based on current time
                $avatar_name = $time . '_' . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

                // Check if file is an image and its size
                $allowed_files = ['png','jpg','jpeg'];
                $extention = pathinfo($avatar_name, PATHINFO_EXTENSION);
                if(in_array($extention, $allowed_files)){
                    if($avatar['size'] < 1000000){
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = "Ukuran foto terlalu besar, harus kurang dari 1MB";
                    }
                } else {
                    $_SESSION['add-user'] = "File harus png, jpg, atau jpeg";
                }
            }
        }
    }

    // Redirect back to add-user page if there was any problem
    if(isset($_SESSION['add-user'])){
        $_SESSION['add-user-data'] = $_POST;
        header('location: ' . ROOT_URL . '/admin/add-user.php');
        die();
    } else {
        // Insert new user into users table
        $insert_user_query = "INSERT INTO users (firstname, lastname, username, email, password, avatar, is_admin) VALUES ('$firstname', '$lastname', '$username', '$email', '$hashed_password', '$avatar_name', $is_admin)";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if(!mysqli_errno($connection)){
            $_SESSION['add-user-success'] = "Pengguna baru $firstname $lastname berhasil terdaftar.";
            header('location: ' . ROOT_URL . 'admin/manage-users.php');
            die();
        }
    }

} else {
    // Redirect to index page if the button was not clicked
    header('location: ' . ROOT_URL . 'index.php');
    die();
}
