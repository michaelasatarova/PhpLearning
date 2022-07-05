<?php

//CREATE CONNECTION
    $connection = mysqli_connect('localhost', 'root', '', 'section7');
    // if($connection){
    //     echo "Connected";
    // }

//GET POST SOMETHING 
    if(isset($_POST['submit'])){
        $username = $_POST['name'];
        $password = $_POST['password'];

        $query = "INSERT INTO assignment(name,password)" ;
        $query .= "VALUES ('$username', '$password')";

        
        $result = mysqli_query($connection, $query);

        if(!$result){
            die('Query Failed' );
        }
    }

//RETRIEVE DATA FROM DB
$query_get = "SELECT * FROM assignment";
$result_get = mysqli_query($connection,$query_get);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 7</title>
</head>
<body>
    <form action="section7.php" method="post">
        <input type="text" name="name" placeholder="name">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="submit" name="submit">
    </form>

    <h1>DATA FROM DB</h1>

    <?php  
        while($row = mysqli_fetch_row($result_get)) {
    ?>
    <pre>
        <?php
        print_r($row);
        ?>
        
    </pre>
    <?php        
         }
    ?>
    
</body>
</html>