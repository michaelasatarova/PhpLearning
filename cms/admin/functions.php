<?php include "../includes/db.php" ?>
<?php

    function confirm($result){

        global $connection;
        if(!$result){
            die("Query Failed "  . mysqli_error($connection));
        }
    }

    function users_online(){
        global $connection;
        
    $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

    if($count == NULL){
        $count_online_users = "INSERT INTO users_online(session, time) VALUES ('$session', '$time')";
        mysqli_query($connection, $count_online_users);   
    }
    else{
        $update_users_online = "UPDATE users_online SET time = '$time' WHERE session = '$session'";
        mysqli_query($connection, $update_users_online);
    }
    $users_online = "SELECT * FROM users_online WHERE time > '$time_out'";
    $test = mysqli_query($connection, $users_online);
    return  mysqli_num_rows($test);
    }
    
    ?>