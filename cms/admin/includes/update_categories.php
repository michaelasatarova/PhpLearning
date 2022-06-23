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

    <?php
    if (isset($_POST)) {
        $the_cat_id_update = $_POST['edit'];

        $query = "UPDATE categories SET cat_title = '{ $the_cat_id_update}' WHERE cat_id = {$cat_id}";
        $update_query = mysqli_query($connection, $query);
        //header("Location: categories.php");
    }

    ?>

</form>