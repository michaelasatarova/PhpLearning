<?php include 'includes/header.php' ?>

<!-- Navigation -->
<?php include 'includes/navigation.php' ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            include 'includes/db.php';

            $per_page = 2;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            else{
                $page = "";
            }

            if($page == "" || $page == 1 ){
                $page_1 = 0;
            }else{
                $page_1 = ($page * $per_page) - $per_page ;
            }
            
            //check post count
            $post_query_count = "SELECT * FROM posts";
            $find_count = mysqli_query($connection, $post_query_count);
            $count = mysqli_num_rows($find_count);

            $count = ceil($count / $per_page);

            $query_post = "SELECT * FROM posts LIMIT $page_1, $per_page";

            $posts = mysqli_query($connection, $query_post);

            if (!$posts) {
                die('Query Failed');
            }

            while ($title = mysqli_fetch_assoc($posts)) {
                $post_id =  $title['post_id'];
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
                    <a href="post.php?p_id=<?php echo  $post_id ?>"> <?php echo  $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id;?>"><?php echo   $post_author ?></a>
                </p>

                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo   $post_author ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo  $post_id ?>"><img class="img-responsive" src="./admin/images/<?php echo   $post_image ?>" alt=""></a>
                <hr>
                <p><?php echo   $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo  $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
            <?php
            }
            ?>






        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php" ?>

    </div>

    <hr>

    <ul class="pager">
        <?php
        
        for($i=1; $i<$count; $i++){
            if($i == $page){
                echo" <li><a class = 'active_link' href='index.php?page={$i}'>$i</a></li>";
            }
            else{
                echo" <li><a href='index.php?page={$i}'>$i</a></li>";
            }
        }
        
        ?>
        
    </ul>

    <!-- Footer -->
    <?php include "includes/footer.php" ?>