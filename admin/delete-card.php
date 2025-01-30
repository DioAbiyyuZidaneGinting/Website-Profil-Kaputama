<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // FOR LATER: Menangani update data terkait (misalnya jika ada referensi ke cards di tabel lain)
    // Anda bisa menambahkan logika pembaruan data jika ada hubungan dengan data lain yang perlu diperbarui.

    // Misalnya, jika Anda ingin menghapus referensi di tabel lain, Anda bisa melakukannya seperti ini:
    // $update_query = "UPDATE some_table SET card_id=NULL WHERE card_id=$id";
    // $update_result = mysqli_query($connection, $update_query);

    if(!mysqli_errno($connection)){
        // Menghapus data card
        $query = "DELETE FROM cards WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        // Menampilkan pesan sukses jika berhasil menghapus
        if(mysqli_affected_rows($connection) > 0){
            $_SESSION['delete-card-success'] = "Card deleted successfully";
        } else {
            $_SESSION['delete-card-failure'] = "Failed to delete card";
        }
    }
}

header('location: ' . ROOT_URL . 'admin/manage-cards.php');
die();
?>
