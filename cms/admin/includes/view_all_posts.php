<?php

include 'delete_modal.php';

if(isset($_POST['checkboxArray'])){
    echo 'Receiving data';

    foreach($_POST['checkboxArray'] as $postValueId){
       $bulk_options =  $_POST['bulk_options'];

       switch($bulk_options){
        case 'published':
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
            $update_to_publish = mysqli_query($connection, $query);
        break;
        case 'draft':
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
            $update_to_draft = mysqli_query($connection, $query);
        break;
        case 'delete':
            $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
            $update_to_delete_status = mysqli_query($connection, $query);
        break;
        case 'clone':
            $query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
            $select_post_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_post_query)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_catagory_id = $row['post_catagory_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_content = $row['post_content'];
                $post_date = $row['post_date'];
            }
            $query = "INSERT INTO posts(post_catagory_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
            $query .= "VALUES({$post_catagory_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";

            $copy_query = mysqli_query($connection, $query);
            confirm($copy_query);

        break;
        


       }
    }
}


?>


<form action="" method="post">
    <div id="bulkOptionsContainer">
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div>
    <br>
    <div class="">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="./posts.php?source=add_post">Add new</a>
    </div>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th><input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Dates</th>
                <th>View page</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <?php
                $query = "SELECT * FROM posts";
                $select_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_user = $row['post_user'];
                    $post_title = $row['post_title'];
                    $post_cathegory_id = $row['post_catagory_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    $post_views_count = $row['post_views_count'];
                ?>

            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value="<?php echo $post_id; ?>"></td>
                <td><?php echo $post_id ?></td>
                <td><?php echo $post_user ?></td>

                <td><?php echo $post_title ?></td>
                <td>
                    <?php echo $post_cathegory_id ?>
                    <?php
                    $query_cat = "SELECT * FROM categories WHERE cat_id = {$post_cathegory_id} ";
                    $select_categories_id = mysqli_query($connection, $query_cat);
                    confirm($select_categories_id);
                    while ($row = mysqli_fetch_assoc($select_categories_id)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo  $cat_title;
                    }

                    ?>

                </td>

                <td><?php echo $post_status ?></td>
                <td><img width="100px" class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></td>
                <td><?php echo $post_tags ?></td>

                <?php
                    $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
                    $send_comment_query = mysqli_query($connection, $query);
                    $row = mysqli_fetch_array($send_comment_query);
                    
                    $comment_id =  0;
                    if(!empty($row['comment_id']) ){
                        $comment_id =  $row['comment_id'];
                    }
                    $count_comments = mysqli_num_rows( $send_comment_query);
                
                ?>

                <td><a href="post_comments.php?id=<?php echo $post_id; ?>"> <?php echo $count_comments ?></a></td>

                <td><a href='../post.php?p_id=<?php echo $post_id ?>'>View post</a></td>
                <td><a href='posts.php?source=edit_post&p_id=<?php echo $post_id ?>'>Edit</a></td>
                <td><a rel='<?php echo $post_id ?>' href='javascript:void(0)' class="delete_link">DELETE</a></td>
             <!--   <td><a onClick="deleteConfirm()" href='posts.php?delete=<?php echo $post_id ?>'>DELETE</a></td> --->
                <td><a href="posts.php?reset=<?php echo $post_id ?>"><?php echo  $post_views_count ?></a></td>
            </tr>

        <?php
                }
        ?>


        </tr>
        </tbody>
    </table>

    <?php

    //delete post with specific ID 
    if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
    }

    //reset view count
    if (isset($_GET['reset'])) {
        $the_post_id = $_GET['reset'];

        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $the_post_id";
        $delete_query = mysqli_query($connection, $query);
        header("Location: posts.php");
    }

    ?>

</form>

<script>

$(document).ready(function(){

    $(".delete_link").on('click', function(){

        let id = $(this).attr("rel");
        let delete_url ="posts.php?delete="+ id +" ";

        $(".modal-delete-link").attr("href", delete_url);
        $("#myModal").modal("show");
        
        
    })
    

});

</script>