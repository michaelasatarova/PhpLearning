<?php

    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_users_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
    }


if(isset($_POST['edit_user'])){

    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_email = $_POST['user_email'];

    // HASH PASSWORD
    $query = "SELECT randSalt FROM users";
    $select_randsalt_query = mysqli_query($connection, $query);
    confirm($select_randsalt_query);

    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);
    

    $query_update_user = "UPDATE users SET ";
    $query_update_user .= "username = '{$username}', ";
    $query_update_user .= "user_password = '{$hashed_password}', ";
    $query_update_user .= "user_firstname = '{$user_firstname}', ";
    $query_update_user .= "user_lastname = '{$user_lastname}', ";
    $query_update_user .= "user_role = '{$user_role}', ";
    $query_update_user .= "user_email = '{$user_email}' ";
    $query_update_user .= "WHERE user_id = {$the_user_id} ";

    $edit_user_query = mysqli_query($connection, $query_update_user);
    confirm($edit_user_query);

}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="username">Username</label>
        <input value="<?php echo $username ;?>" type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="<?php echo $user_password ;?>" type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email ;?>" type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_role">User Role</label>
        <select name="user_role" id="post_category_id">
            <option value="<?php echo $user_role;?>" default><?php echo $user_role;?></option>
            <?php

                if($user_role == 'Admin'){
                    echo " <option value='Subscriber'> Subscriber</option>";
                }else{
                    echo " <option value='Admin'> Admin</option>";
                }
            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_firstname ;?>" type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input  value="<?php echo $user_lastname ;?>" type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>

</form>