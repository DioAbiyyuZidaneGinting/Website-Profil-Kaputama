<?php
include 'partials/header.php';

// Fetch all cards from the database
$query = "SELECT * FROM cards ORDER BY title";
$result = mysqli_query($connection, $query);
?>

<section class="dashboard">
    <?php if (isset($_SESSION['add-card-success'])) : // Shows if add card was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-card-success']; unset($_SESSION['add-card-success']); ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-card'])) : // Shows if edit card was not successful ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-card']; unset($_SESSION['edit-card']); ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-card-success'])) : // Shows if edit card was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-card-success']; unset($_SESSION['edit-card-success']); ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-card-success'])) : // Shows if delete card was successful ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-card-success']; unset($_SESSION['delete-card-success']); ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toogle"><i class='bx bx-chevron-right'></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toogle"><i class='bx bx-chevron-left'></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class='bx bx-pencil'></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php"><i class='bx bxs-dashboard'></i>
                        <h5>Manage Post</h5>
                    </a>
                </li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>
                    <li>
                        <a href="add-user.php"><i class='bx bx-user-plus'></i>
                            <h5>Add User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php"><i class='bx bx-user-pin'></i>
                            <h5>Manage User</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php"><i class='bx bx-edit'></i>
                            <h5>Add Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php"><i class='bx bx-list-ul'></i>
                            <h5>Manage Category</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-card.php"><i class='bx bx-card'></i>
                            <h5>Add Card</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-cards.php" class="active"><i class='bx bx-cog'></i>
                            <h5>Manage Card</h5>
                        </a>
                    </li>

                    
                <?php endif ?>
            </ul>
        </aside>

        <main>
            <h2 class="manage">Manage Cards</h2>
            <?php if (mysqli_num_rows($result) > 0) : ?>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th class="title">Title</th>
                            <th>Description</th>

                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($card = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $card['title'] ?></td>
                                <td><?= $card['description'] ?></td>
                                <td><a href="edit-card.php?id=<?= $card['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="delete-card.php?id=<?= $card['id'] ?>" class="btn sm danger">Delete</a></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>

            <?php else : ?>
                <div class="alert__message error"><?= "No Cards Found" ?></div>
            <?php endif ?>
        </main>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
