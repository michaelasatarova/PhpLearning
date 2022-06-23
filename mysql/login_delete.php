<?php

include "db.php";
include "functions.php";

if(isset($_POST['submit'])){
    deleteRows();
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
            <form action="login_delete.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <select name="id" id="">
                        <?php
                            showAllData();
                        ?>
                        
                    </select>
                </div>
                <br>
                <input type="submit" value="DELETE" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
    
</body>
</html>