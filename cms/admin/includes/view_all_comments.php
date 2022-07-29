
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>In Response to</th>
            <th>Approve</th>
            <th>Unaprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php
            $query = "SELECT * FROM comments";
            $select_comments = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_comments)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_email = $row['comment_email'];
                $comment_content = $row['comment_content'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
            ?>

        <tr>
            <td><?php echo $comment_id ?></td>
            <td><?php echo $comment_author ?></td>
            <td><?php echo $comment_content ?></td>
            <td><?php echo $comment_email ?></td>
            <td><?php echo $comment_status ?></td>
            <td><?php echo $comment_date ?></td>
            
            <td>
            <?php 

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
            $select_post_id_query = mysqli_query($connection, $query);
            confirm($select_post_id_query);

            while($row = mysqli_fetch_assoc($select_post_id_query)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
            ?>
                 <a href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>

            <?php 
            }
            ?>
            </td>
            
            <td><a href='comments.php?aprove=<?php echo $comment_id ?>'>Approve</a></td>
            <td><a href='comments.php?unaprove=<?php echo $comment_id ?>'>Unaprove</a></td>
            <td><a href='comments.php?delete=<?php echo $comment_id ?>'>DELETE</a></td>
        </tr>

    <?php
            }
    ?>


    </tr>
    </tbody>
</table>

<?php

// APROVE COMMENT
if(isset($_GET['aprove'])){
    $the_comment_id = $_GET['aprove'];
     $query = "UPDATE comments SET comment_status = 'aproved' WHERE comment_id = $the_comment_id ";
     $aprove_query = mysqli_query($connection, $query);
     header("Location: comments.php");
     
 }

// UNAPROVE COMMENT
if(isset($_GET['unaprove'])){
    $the_comment_id = $_GET['unaprove'];
     $query = "UPDATE comments SET comment_status = 'unaproved' WHERE comment_id = $the_comment_id";
     $unaprove_query = mysqli_query($connection, $query);
     header("Location: comments.php");
     
 }


// DELETE COMMENT
if(isset($_GET['delete'])){
   $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php");
    
}

?>