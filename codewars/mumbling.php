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
    This time no story, no theory. The examples below show you how to write function accum:
    Examples:
    accum("abcd") -> "A-Bb-Ccc-Dddd"
    accum("RqaEzty") -> "R-Qq-Aaa-Eeee-Zzzzz-Tttttt-Yyyyyyy"
    accum("cwAt") -> "C-Ww-Aaa-Tttt"
    The parameter of accum is a string which includes only letters from a..z and A..Z.
    </pre>
    
    <?php 
    
    function accum($s) {
        $my_variabe = strtolower($s);
        //spit string and convert to array 
        $to_array = str_split($my_variabe);
        $new_array = [];

        //according to index add letters
        for($i = 0; $i<count($to_array); $i++){
           $multiply =  $to_array[$i] . str_repeat($to_array[$i], $i);
           $new_array[] = ucfirst($multiply);
        }

        $result = implode("-", $new_array);
        echo $result;
    }

   accum("ZpglnRxqenU");

    ?>
</body>
</html>