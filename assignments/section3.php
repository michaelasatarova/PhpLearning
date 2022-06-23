<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 3 </title>
</head>
<body>
    <h2>make if else statement example</h2>
    <?php

    if(5 + 5 === 10){
        echo "I love PHP";
    }
    else{
        echo "I don´t care";
    }
    ?>

    <h2>Make for loop that displays 10 numbers</h2>
    <?php
    for($number = 1; $number < 11; $number++){
        echo $number;
        echo "<br/>";
    }
    ?>

    <h2>Make an switch statement example</h2>
    <?php
    
    $my_number = 9;

    switch($my_number){
        case 5:
             echo "My given number is 5";
             break;
        case 8:
             echo "My given number is 8";
             break;
        case 4:
             echo "My given number is 4";
             break;
        case 10:
             echo "My given number is 10";
             break;
        case 9:
             echo "My given number is 9";
             break;
        default:
            echo "Given number uknown";
    }

    ?>
    
</body>
</html>