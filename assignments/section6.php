<?php

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo $username;
    echo $password;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

    <form action="section6.php" method="post">
        <input type="username" placeholder="Enter Username" name="username">
        <input type="password" placeholder="Enter Password" name="password">
        <input type="submit" placeholder="submit" name="submit">
    </form>
    
</body>
</html>