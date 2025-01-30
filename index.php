<?php
session_start();
include 'partials/header.php';

//fetch featured post from database
$featured_query = "SELECT * FROM posts WHERE is_featured=1 LIMIT 1"; // Ambil hanya satu featured post
$featured_result = mysqli_query($connection, $featured_query);
$featured = mysqli_fetch_assoc($featured_result);

//fetch 0 post from posts table, excluding the featured post
$query = "SELECT * FROM posts WHERE is_featured=0 ORDER BY date_time DESC LIMIT 9"; // Ambil postingan yang tidak featured
$posts = mysqli_query($connection, $query);
?>


<!-- show featured post if there any -->
    <?php if(mysqli_num_rows($featured_result) == 1) : ?>
    <section class="featured" >
        <div class="container featured__container" >
            <div class="post__thumbnail" data-aos="fade-down">
                <img src="images/<?= $featured['thumbnail'] ?>"> <!-- Untuk nampilkan gambar dari database / bagian admin ke halaman user -->
            </div>
            <div class="post__info" data-aos="fade-up">
                <?php
                    //fetch category from categories table using category_id of post
                    $category_id = $featured['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);

                ?>
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $featured['category_id'] ?>"
                 class="category__button"><?= $category['title']; ?></a>
                 <h2 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>

                <p class="post_body">
                    <?= substr($featured['body'], 0, 300 ) ?>..
                </p>

                <div class="post__author">
                    <?php 
                    //fetch author from users table using author_id
                    $author_id = $featured['author_id'];
                    $author_query = "SELECT * FROM users WHERE id=$author_id";
                    $author_result = mysqli_query($connection, $author_query);
                    $author = mysqli_fetch_assoc($author_result);
                    ?>
                    <div class="post__author-avatar">
                        <img src="images/<?= $author['avatar'] ?>">
                    </div>
                    <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}"?></h5> <!-- Untuk buat nama admin / author siapa yang buat -->
                        <small>
                            <?= date("M d, Y - H:i", strtotime($featured['date_time']))  ?> <!-- Untuk buat tanggal , bulan, tahun kapan di buat -->
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif ?>
    <!--===========================End of featured section ===================-->


    
    <section class="posts <?= $featured ? '' : 'section__extra-margin' ?>" data-aos="fade-up"
    data-aos-duration="3000">
        <div class="container posts__container">
            <?php while( $post = mysqli_fetch_assoc($posts)): ?>
            <article class="posts">
                <div class="post__thumbnail">
                    <img src="images/<?= $post['thumbnail'] ?>">
                </div>
                <div class="post__info">
                    <?php
                        //fetch category from categories table using category_id of post
                        $category_id = $post['category_id'];
                        $category_query = "SELECT * FROM categories WHERE id=$category_id";
                        $category_result = mysqli_query($connection, $category_query);
                        $category = mysqli_fetch_assoc($category_result);

                    ?>
                    <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title']; ?></a>
                    <h3 class="post__title">
                        <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p class="post__body">
                    <?= substr($post['body'], 0, 150 ) ?>..
                    </p>
                    <div class="post_author">
                        <?php 
                        //fetch author from users table using author_id
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                        ?>
                        <div class="post__author-avatar">
                            <img src="images/<?= $author['avatar'] ?>">
                        </div>
                        <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']}"?></h5> <!-- Untuk buat nama admin / author siapa yang buat -->

                            <small>
                            <?= date("M d, Y - H:i", strtotime($post['date_time']))  ?> <!-- Untuk buat tanggal , bulan, tahun kapan di buat -->
                            </small>
                        </div>
                    </div>
                </div>
            </article>
            <?php endwhile ?>
        </div>
        
    </section>
    <!--===============================END OF POST===========================-->



<!--===============================Video===========================-->
    <section class="video" >
        <div class="container video-container">
        <iframe data-aos="flip-left" class="video_player" src="https://www.youtube.com/embed/NbYx9HYxgZk?si=wiZhZQ7pp1xxIveL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>

<!--===============================END OF VIDEO===========================-->
<!--===============================Card===========================-->
<section class="video">
    <div class="container_Brosur" id="container_Brosur">
        <?php
        $all_cards_query = "SELECT * FROM cards";
        $all_cards = mysqli_query($connection, $all_cards_query);
        ?>
        <?php while($card = mysqli_fetch_assoc($all_cards)) : ?>
            <div class="card" data-aos="zoom-in-right">
                <h2><?= $card['title']; ?></h2>
                <p><?= $card['description']; ?></p>
                <a href="<?= $card['link']; ?>" class="selengkapnya">Selengkapnya</a>
            </div>
        <?php endwhile; ?>
    </div>
</section>


<!--===============================END OF CARD===========================-->


<!--===============================CATEGORY===========================-->

    <section class="category__buttons">
        <div class="container category__buttons-container" data-aos="fade-up"
        data-aos-duration="3000">
            <?php
                $all_categories_query = "SELECT * FROM categories";
                $all_categories = mysqli_query($connection, $all_categories_query);
            ?>
            <?php while($category = mysqli_fetch_assoc($all_categories)) : ?>
            <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title']; ?></a>
            <?php endwhile ?>
        </div>
    </section>
    <!--========================END OF CATEGORY BUTTONS ==========================-->



    <?php

    include 'partials/footer.php';

    ?>
