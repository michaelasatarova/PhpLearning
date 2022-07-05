<?php include 'includes/header.php' ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php' ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        COMMENTS TO CURRENT POST
                    </h1>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php
                                $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection, $_GET['id']) . " ";
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
                                <td><a href='comments.php?delete=<?php echo $comment_id ?>'>DELETE</a></td>
                            </tr>

                        <?php
                                }
                        ?>


                        </tr>
                        </tbody>
                    </table>

                    <?php

                    // DELETE COMMENT
                    if (isset($_GET['delete'])) {
                        $the_comment_id = $_GET['delete'];

                        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
                        $delete_query = mysqli_query($connection, $query);
                        header("Location: comments.php");
                    }

                    ?>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>

<?php include 'includes/footer.php' ?>