<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 2</title>
</head>
<body>
    <h2>Make 2 variables called number 1 and number2 and set number1 = 10; and number2 = 20 and count them</h2>
        <?php
        $number1 = 10;
        $number2 = 20;

        echo $number1 + $number2;
        ?>
    <h2>Make 2 arrays,one regular and another one associative</h2>

    <?php
    $regular_array = [1, 2, 3, 4];
    $associative_array = array("first_name" => "Michaela", 'last_name'=> "Šatarova");

    print_r($regular_array);
    echo "<br/>";
    print_r($associative_array);
    echo "<br/>";

    echo $regular_array[1];
    echo "<br/>";
    echo $associative_array["first_name"];
    echo "<br/>";

    ?>


</body>
</html>