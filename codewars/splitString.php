<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Split Strings</title>
</head>

<body>
    <pre>Complete the solution so that it splits the string into pairs of two characters. If the string contains an odd number of characters then it should replace the missing second character of the final pair with an underscore ('_').
    Examples:

* 'abc' =>  ['ab', 'c_']
* 'abcdef' => ['ab', 'cd', 'ef']
</pre>

<?php 

function splitMe($arg){

    $split_me = str_split($arg, 2);
    $last_value_of_array = $split_me[array_key_last($split_me)];
    $length_of_last_element_in_array = strlen($last_value_of_array);
    
    if($length_of_last_element_in_array === 1){
       $replacement = array(1 => $last_value_of_array . "_") ;
       $result = array_replace($split_me, $replacement);
         return $result;
    }
    elseif($arg === ""){
        return [];
    }
    else{
        return $split_me;
    } 

}

splitMe('abcdef');
?>

</body>
</html>