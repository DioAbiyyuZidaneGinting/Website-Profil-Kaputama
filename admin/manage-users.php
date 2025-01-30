<?php
include 'partials/header.php';

// mengambil users dari database tetapi bukan users saat ini
$current_admin_id = $_SESSION['user-id'];

$query = "SELECT * FROM users WHERE NOT id=$current_admin_id";
$users = mysqli_query($connection, $query);
?>

<section class="dashboard">
    <?php if (isset($_SESSION['add-user-success'])) : //shows if add user was successful 
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['add-user-success'];
                unset($_SESSION['add-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-user-success'])) : //shows if edit user was successful 
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['edit-user-success'];
                unset($_SESSION['edit-user-success']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['edit-user'])) : //shows if edit user was not Successful 
    ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['edit-user'];
                unset($_SESSION['edit-user']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-user'])) : //shows if delete user was not Successful 
    ?>
        <div class="alert__message error container">
            <p>
                <?= $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
                ?>
            </p>
        </div>
    <?php elseif (isset($_SESSION['delete-user-success'])) : //shows if delete user was Successful 
    ?>
        <div class="alert__message success container">
            <p>
                <?= $_SESSION['delete-user-success'];
                unset($_SESSION['delete-user-success']);
                ?>
            </p>
        </div>


    <?php endif ?>
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
                        <a href="manage-users.php" class="active"><i class='bx bx-user-pin'></i>
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
                        <a href="manage-cards.php"><i class='bx bx-cog'></i>
                            <h5>Manage Card</h5>
                        </a>
                    </li>

                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2 class="manage">Manage Users</h2>
            <?php if (mysqli_num_rows($users) > 0) : ?>
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th class="title">Nama</th>
                            <th class="title">Username</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Admin</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                            <tr>
                                <td><?= "{$user['firstname']} {$user['lastname']}" ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>" class="btn sm danger">Delete</a></td>
                                <td><?= $user['is_admin'] ? 'Yes' : 'No' ?></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert__message error"><?= "No users found" ?></div>
            <?php endif ?>
        </main>
    </div>
</section>

<?php
include '../partials/footer.php';
?>