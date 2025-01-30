<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);

    if($title && $description && $link){
        $query = "INSERT INTO cards (title, description, link) VALUES ('$title', '$description', '$link')";
        $result = mysqli_query($connection, $query);
        if(mysqli_errno($connection)){
            $_SESSION['add-card'] = "Couldn't add card";
        } else {
            $_SESSION['add-card-success'] = "$title card added successfully";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-cards.php');
die();
?>
