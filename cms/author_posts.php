<?php include 'includes/header.php' ?>

<!-- Navigation -->
<?php include 'includes/navigation.php' ?>
<?php include 'admin/functions.php' ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            include 'includes/db.php';

            if (isset($_GET['p_id'])) {
                $the_post_id = $_GET['p_id'];
                $the_post_author = $_GET['author'];
            }



            $query_post = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' ";

            $posts = mysqli_query($connection, $query_post);
            confirm($posts);

            while ($title = mysqli_fetch_assoc($posts)) {
                $post_title =  $title['post_title'];
                $post_author =  $title['post_author'];
                $post_date =  $title['post_date'];
                $post_image =  $title['post_image'];
                $post_content =  $title['post_content'];
                $post_tag =  $title['post_tags'];
                $post_comment_count =  $title['post_comment_count'];
                $post_status =  $title['post_status'];


            ?>


                <h1 class="page-header">
                    <?php echo  $post_title ?>

                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo  $the_post_id ?>"> <?php echo  $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $the_post_id;?>"><?php echo $post_author; ?></a>
                </p>

                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo   $post_author ?></p>
                <hr>
                <img class="img-responsive" src="./admin/images/<?php echo   $post_image ?>" alt="">
                <hr>
                <p><?php echo   $post_content ?></p>
                <hr>
            <?php
            }
            ?>



        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php" ?>