<?php

include "db.php";

if(isset($_POST['submit'])){

   $username = $_POST['username'];
   $password = $_POST['password'];
    
   if($username && $password){
    echo $username;
    echo $password;
   }
   else{
       echo "Set your name and passsword";
   }

   $query = "INSERT INTO users(username,password)" ;
   $query .= "VALUES ('$username', '$password')";

   $result = mysqli_query($connection, $query);

   if(!$result){
       die('Query Failed' );
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>First Database Use</title>
</head>
<body>
    <div class="container">
        <div class="col-xs-6">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <br>
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    
</body>
</html>