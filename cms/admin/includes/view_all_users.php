
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_role = $row['user_role'];
                $user_email = $row['user_email'];
                $user_image = $row['user_image'];
            ?>

        <tr>
            <td><?php echo $user_id ?></td>
            <td><?php echo $username ?></td>
            <td><?php echo $user_firstname ?></td>
            <td><?php echo $user_lastname ?></td>
            <td><?php echo $user_email ?></td>
            <td><?php echo $user_role ?></td>
            <td><?php echo $user_image ?></td>

            <td><a href='users.php?change_to_admin=<?php echo $user_id ?>'>Change to ADMIN</a></td>
            <td><a href='users.php?change_to_subscriber=<?php echo $user_id ?>'>Change to SUBSCRIBER</a></td>
            <td><a href='users.php?source=edit_user&edit_user=<?php echo $user_id ?>'>EDIT</a></td>
            <td><a href='users.php?delete=<?php echo $user_id ?>'>DELETE</a></td>
            
        </tr>

    <?php
            }
    ?>

    </tr>
    </tbody>
</table>

<?php

// CHANGE TO ADMIN
if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];
     $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $the_user_id ";
     $change_to_admin_query = mysqli_query($connection, $query);
     header("Location: users.php");
     
 }

//CHANGE TO SUBSCRIBER
if(isset($_GET['change_to_subscriber'])){
    $the_user_id = $_GET['change_to_subscriber'];
     $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_user_id";
     $change_to_subscriber_query = mysqli_query($connection, $query);
     header("Location: users.php");
     
 }

// DELETE USER
if(isset($_GET['delete'])){
   $the_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php");
    
}

?>