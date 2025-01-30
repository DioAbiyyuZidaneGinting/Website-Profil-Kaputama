<?php
include 'partials/header.php';
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Card</h2>
        
        <?php if(isset($_SESSION['add-card'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-card']; 
                    unset($_SESSION['add-card']); ?>
                </p>
            </div>
        <?php endif; ?>
        
        <form action="add-card-logic.php" method="POST">
            <input type="text" name="title" placeholder="Title" required>
            <textarea rows="4" name="description" placeholder="Description" required></textarea>
            <input type="text" name="link" placeholder="Link" required>
            <button type="submit" name="submit" class="btn2">Add Card</button>
        </form>
    </div>
</section>

<?php
include 'partials/footer.php';
?>
