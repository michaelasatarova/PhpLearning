<?php include 'db.php' ;?>
<?php include '../admin/functions.php'; ?>
<?php session_start(); ?>


<?php 
if(isset($_POST['login'])){

    //tieto hodnoty (username, password) pochadzaju z name zo sidebaru ktorý posiela value na tuto php stranku
    $username = mysqli_real_escape_string($connection, $_POST['username']); 
    $user_password = mysqli_real_escape_string($connection, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_query = mysqli_query($connection, $query);
    confirm( $select_user_query);

    while($row = mysqli_fetch_assoc($select_user_query)){
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_email = $row['user_email'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

    }

    $password = crypt($password, $db_user_password);

     if($username ===  $db_username && $user_password === $db_user_password){
        $_SESSION['username'] =  $db_username;
        $_SESSION['firstname'] =  $db_firstname;
        $_SESSION['lastname'] =  $db_lastname;
        $_SESSION['user_role'] =  $db_user_role;
        $_SESSION['user_email'] =  $db_user_email;
        $_SESSION['user_password'] =  $db_user_password;

        header("Location: ../admin");
    }else{
       header("Location: ../index.php");
    }
}

?>




