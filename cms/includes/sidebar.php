<div class="col-md-4">

    <!-- LOGIN -->
    <div class="well">

    <?php 

        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            echo "<h4>Login as  {$username} </h4>";

            echo '<a href="includes/logout.php" class="btn btn-primary">LOGOUT</a>';
        }
        else{  
    ?>

        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Enter Username" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter Password" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" name="login" type="submit">SUBMIT</button>
            </div>
        </form>
        <!-- /.input-group -->
        <?php } ?>

    </div>

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="search" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">



        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php

                    include 'db.php';

                    $query = "SELECT * FROM categories";
                    $select_all_categories_sidebar = mysqli_query($connection, $query);

                    if (!$select_all_categories_sidebar) {
                        die("Query Failed");
                    }

                    while ($row = mysqli_fetch_row($select_all_categories_sidebar)) {
                        $cat_title = $row[1];
                        $cat_id = $row[0];
                    ?>
                        <li>
                            <a href="category.php?category=<?php echo $cat_id;?>"><?php echo $cat_title; ?></a>
                        </li>
                    <?php  } ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include 'includes/widget.php'?>

</div>