<?php
    
include "db.php";

    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Query Failed' );
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
            <?php
            
                while($row = mysqli_fetch_row($result)) {
                    print_r($row);
                }
            ?>
        </div>
    </div>
    
</body>
</html>