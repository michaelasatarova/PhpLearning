<?php

if(isset($_POST['checkboxArray'])){
    echo 'Receiving data';

    foreach($_POST['checkboxArray'] as $postValueId){
       $bulk_options =  $_POST['bulk_options'];

       switch($bulk_options){
        case 'published';
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
            $update_to_publish = mysqli_query($connection, $query);
        break;
        case 'draft';
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
            $update_to_draft = mysqli_query($connection, $query);
        break;
        case 'delete';
            $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
            $update_to_delete_status = mysqli_query($connection, $query);
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
                    $post_title = $row['post_title'];
                    $post_cathegory_id = $row['post_catagory_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                ?>

            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkboxArray[]" value="<?php echo $post_id; ?>"></td>
                <td><?php echo $post_id ?></td>
                <td><?php echo $post_author ?></td>
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
                <td><?php echo $post_comment_count ?></td>
                <td><?php echo $post_date ?></td>
                <td><a href='../post.php?p_id=<?php echo $post_id ?>'>View post</a></td>
                <td><a href='posts.php?source=edit_post&p_id=<?php echo $post_id ?>'>Edit</a></td>
                <td><a onClick="deleteConfirm()" href='posts.php?delete=<?php echo $post_id ?>'>DELETE</a></td>
            </tr>

        <?php
                }
        ?>


        </tr>
        </tbody>
    </table>

    <?php

    if (isset($_GET['delete'])) {
        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
    }

    ?>

</form>