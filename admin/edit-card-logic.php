<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
    $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);

    // Validate input
    if (!$title || !$description || !$link) {
        $_SESSION['edit-card'] = "Invalid form input on edit card page";
    } else {
        $query = "UPDATE cards SET title='$title', description='$description', link='$link' WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-card'] = "Couldn't update card";
        } else {
            $_SESSION['edit-card-success'] = "Card '$title' was updated successfully";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-cards.php');
die();
?>
