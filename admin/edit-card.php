<?php
include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch card from database
    $query = "SELECT * FROM cards WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $card = mysqli_fetch_assoc($result);
    }

} else {
    header('location: ' . ROOT_URL . 'admin/manage-cards');
    die();
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Card</h2>

        <form action="<?= ROOT_URL ?>admin/edit-card-logic.php" method="POST">
            <input type="hidden" name="id" value="<?= $card['id'] ?>">
            <input type="text" name="title" value="<?= $card['title'] ?>" placeholder="Title" required>
            <textarea rows="4" name="description" placeholder="Description" required><?= $card['description'] ?></textarea>
            <input type="text" name="link" value="<?= $card['link'] ?>" placeholder="Link ">
            <button type="submit" name="submit" class="btn2">Update Card</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
