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
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php

                        if (isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];

                            if ($cat_title == "" || empty($cat_title)) {
                                echo "This field should not be empty";
                            } else {

                                $query = "INSERT INTO categories(cat_title)";
                                $query .= "VALUES('{$cat_title}')";

                                $create_category_query = mysqli_query($connection, $query);

                                if (!$create_category_query) {
                                    die("Query failed"  . mysqli_error($connection));
                                }
                            }
                        }

                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>

                        <form action="" method="post">
                            <?php

                            if (isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];

                                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                $select_categories_id = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_row($select_categories_id)) {
                                    $cat_id = $row[0];
                                    $cat_title = $row[1];
                            ?>
                                    <div class="form-group">
                                        <label for="cat_title">Update</label>
                                        <input value="<?php if (isset($cat_title)) {
                                                            echo $cat_title;
                                                        } ?>" class="form-control" type="text" name="cat_title">
                                    </div>
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="edit" value="Update">
                                    </div>
                            <?php

                                }
                            }
                            ?>

                            <?php //UPDATE QUERY
                            if (isset($_POST['edit'])) {
                                $the_cat_id_update = $_POST['cat_title'];

                                $query = "UPDATE categories SET cat_title = '$the_cat_id_update' WHERE cat_id = {$cat_id}";
                                $update_query = mysqli_query($connection, $query);
                                header("Refresh:0; url=http://localhost/phpTest/cms/admin/categories.php");
                                //header("Location: categories.php");
                            }
                            
                            ?>
                        </form>

                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $query_admin = "SELECT * FROM categories";
                                $select_all_categories_admin = mysqli_query($connection, $query_admin);

                                if (!$select_all_categories_admin) {
                                    die("Query Failed");
                                }

                                while ($row = mysqli_fetch_row($select_all_categories_admin)) {
                                    $cat_id = $row[0];
                                    $cat_title = $row[1];
                                ?>
                                    <tr>
                                        <td><?php echo $cat_id; ?></td>
                                        <td><?php echo $cat_title; ?></td>
                                        <td><a href="categories.php?delete=<?php echo $cat_id; ?>"> DELETE</a> </td>
                                        <td><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a> </td>
                                    </tr>
                                <?php  } ?>

                                <?php

                                if (isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];

                                    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
                                    $query_delete = mysqli_query($connection, $query);
                                    header("Refresh:0; url=http://localhost/phpTest/cms/admin/categories.php");
                                    //header("Location: categories.php");
                                }

                                ?>



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>

<?php include 'includes/footer.php' ?>