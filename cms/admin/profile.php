<?php include 'includes/header.php' ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php' ?>
    <div id="page-wrapper">

        <div class="container-fluid">
            <?php
            if (isset($_SESSION['username'])) {
               $username =  $_SESSION['username'];

               $query = "SELECT * FROM users WHERE username = '{$username}'";
               $select_user_profile_query = mysqli_query($connection, $query);

               while($row = mysqli_fetch_assoc($select_user_profile_query)){
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_role = $row['user_role'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
               }

            }
            ?>

            <?php 
            if(isset($_POST['update_profile'])){

                $username = $_POST['username'];
                $user_password = $_POST['user_password'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_role = $_POST['user_role'];
                $user_email = $_POST['user_email'];
            
                $query_update_user = "UPDATE users SET ";
                $query_update_user .= "username = '{$username}', ";
                $query_update_user .= "user_password = '{$user_password}', ";
                $query_update_user .= "user_firstname = '{$user_firstname}', ";
                $query_update_user .= "user_lastname = '{$user_lastname}', ";
                $query_update_user .= "user_role = '{$user_role}', ";
                $query_update_user .= "user_email = '{$user_email}' ";
                $query_update_user .= "WHERE username ='{$username}' ";
            
                $update_user_query = mysqli_query($connection, $query_update_user);
                confirm($update_user_query);
            }
            
            ?>
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        PROFILE
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="user_firstname">First Name</label>
                            <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
                        </div>
                        <div class="form-group">
                            <label for="user_lastname">Last Name</label>
                            <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
                        </div>
                        <!-- <div class="form-group">
                            <label for="username">Username</label>
                            <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
                        </div>-->
                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
                        </div>
                        <div class="form-group">
                            <label for="user_role">User Role</label>
                            <select name="user_role" id="post_category_id">
                                <option value="<?php echo $user_role; ?>" default><?php echo $user_role; ?></option>
                                <?php

                                if ($user_role == 'Admin') {
                                    echo " <option value='Subscriber'> Subscriber</option>";
                                } else {
                                    echo " <option value='Admin'> Admin</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Post Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
                        </div>

                    </form>



                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>

<?php include 'includes/footer.php' ?>