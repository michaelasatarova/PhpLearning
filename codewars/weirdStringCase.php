<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mumbling</title>
</head>

<body>
    <pre>
    Write a function toWeirdCase (weirdcase in Ruby) that accepts a string, and returns the same string with all even indexed characters in each word upper cased, and all odd indexed characters in each word lower cased. The indexing just explained is zero based, so the zero-ith index is even, therefore that character should be upper cased and you need to start over for each word.
    The passed in string will only consist of alphabetical characters and spaces(' '). Spaces will only be present if there are multiple words. Words will be separated by a single space(' ').
    
    Examples:
    toWeirdCase("String"); // => returns "StRiNg"
    toWeirdCase("Weird string case"); // => returns "WeIrD StRiNg CaSe"
    </pre>

    <?php

    function toWeirdCase($string) {
        
        // $result = [];

        // for($i = 0; $i <strlen($string); $i++){

        //     if($i == 0 || $i % 2 == 0){
        //         array_push($result, strtoupper($string[$i]));
        //     }
        //     else{
        //         array_push($result, strtolower($string[$i]));
        //     }
        // }
        // echo join("", $result);

       $split_string_to_array = explode(" ", $string);

       for($i = 0; $i < count($split_string_to_array); $i++){
        echo $split_string_to_array[$i];
        echo "<br>";
            for($j = 0; $j <strlen($split_string_to_array[$i]); $j++){
                    echo $split_string_to_array[$i];
            if($j == 0 || $j % 2 == 0){
            //    echo(strtoupper($string[$j]));
            }
            else{
            //    echo(strtolower($string[$j]));
            }
        }
        
       }




    }

    toWeirdCase("Hello world foo bar baz");

    ?>
</body>

</html>