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
          

                //Views setting
                $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $the_post_id ";
                $send_query = mysqli_query($connection, $view_query);
                confirm($send_query);


            $query_post = "SELECT * FROM posts WHERE post_id = $the_post_id ";

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
                    by <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $the_post_id;?>"><?php echo   $post_author ?></a>
                </p>

                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo   $post_author ?></p>
                <hr>
                <img class="img-responsive" src="./admin/images/<?php echo   $post_image ?>" alt="">
                <hr>
                <p><?php echo   $post_content ?></p>
                <hr>
            <?php
            }}
            else{
                header("Location: index.php");
            }
        
        
        
            ?>


            <!-- Blog Comments -->

            <?php

            if (isset($_POST['create_comment'])) {

                if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {

                    $the_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_text'];

                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unaproved', now() )";
                    $create_comment_query = mysqli_query($connection, $query);
                    confirm($create_comment_query);

                    $query_update_comment_count = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                    $query_update_comment_count .= "WHERE post_id = $the_post_id ";

                    $update_comment_count = mysqli_query($connection, $query_update_comment_count);
                    confirm($update_comment_count);
                }
                else{
                    echo "<script>alert('Fields can´t be empty')</script>";
                }
            }
            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="comment_author">Author</label>
                        <input class="form-control" type="text" name="comment_author">
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input class="form-control" type="email" name="comment_email">
                    </div>
                    <div class="form-group">
                        <label for="comment_text">Comment</label>
                        <textarea class="form-control" rows="3" name="comment_text"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" name="create_comment" value="Submit" />
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <?php

            $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
            $query .= "AND comment_status = 'aproved' ";
            $query .= "ORDER BY comment_id DESC ";
            $select_comment_query = mysqli_query($connection, $query);
            confirm($select_comment_query);
            while ($row = mysqli_fetch_assoc($select_comment_query)) {
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];

            ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>


            <?php  } ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php" ?>