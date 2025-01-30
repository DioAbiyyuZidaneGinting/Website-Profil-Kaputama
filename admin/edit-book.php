<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch book from database
    $query = "SELECT * FROM buku WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $book = mysqli_fetch_assoc($result);
    } else {
        header('location: ' . ROOT_URL . 'admin/manage-books.php');
        die();
    }
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Book</h2>

        <form action="<?= ROOT_URL ?>admin/edit-book-logic.php" method="POST">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            <input type="text" name="judul_buku" value="<?= $book['judul_buku'] ?>" placeholder="Title" required>
            <textarea rows="4" name="deskripsi" placeholder="Description" required><?= $book['deskripsi'] ?></textarea>
            <input type="text" name="penulis" value="<?= $book['penulis'] ?>" placeholder="Author">
            <input type="text" name="link" value="<?= $book['link'] ?>" placeholder="Link">
            <button type="submit" name="submit" class="btn2">Update Book</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
