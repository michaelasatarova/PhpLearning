<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    phpinfo();
        $title= "Michaela ide ti";

        $numberList = array();
        $numberList = [5, 4, 8, 3];

        $names = array("first_name" => 'Edwin');
        echo $names['first_name'];

        
    $number = 34;

    switch($number){
        case 34 : 
            echo "it is 34";
            break;
        case 31 : 
            echo "it is 31";
            break;
        case 35 : 
            echo "it is 35";
            break;
        case 38 : 
            echo "it is 38";
            break;
        default:
          echo "we could not find anything";
    }

    $counter = 0;
    while($counter < 10){
        echo "hello Students";
        $counter ++;
    }

    for($counter = 0; $counter < 10; $counter++){
        echo $counter;

    }

    echo "<br/>";

    $numbers = [1, 2, 8, 20, 50];
    foreach($numbers as $number){
        echo $number + 2;
        echo "<br/>";
    }

    ?>
        <h1>Hello Students <?php echo $title?></h1>

        <h2>FUNCTIONS</h2>

        <?php
        
        function say($arg){
            return  $arg; 
        }
        echo say("Test");

        define("NAME", 1000);
        echo NAME;

        echo "<br/>";
        echo pow(2, 7);
        echo rand(1, 1000);
        echo sqrt(100);
        echo ceil(5.4);
        echo floor(5.6);

        echo "<br/>";
        
        $string = "Hello do you like my courses?";
        echo strlen($string);
        echo strtoupper($string);

        $list = [1, 5, 12, 4, 2];
        echo max($list);
        
        ?>
</body>
</html>