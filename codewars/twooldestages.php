<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2 Oldest Ages</title>
</head>

<body>
    <pre>
    The two oldest ages function/method needs to be completed. It should take an array of numbers as its argument and return the two highest numbers within the array. The returned value should be an array in the format [second oldest age, oldest age].

The order of the numbers passed in could be any order. The array will always include at least 2 items. If there are two or more oldest age, then return both of them in array format.

For example (Input --> Output):

[1, 2, 10, 8] --> [8, 10]
[1, 5, 87, 45, 8, 8] --> [45, 87]
[1, 3, 10, 0]) --> [3, 10]
    </pre>

    <?php
    function twoOldestAges($ages)
    {
        $new_array = [];
        // sort number from smallest to largest
        sort($ages);
        foreach ($ages as $key => $val) {
            $new_array[] = $val ;
        }

        //pick up last 2 numbers and push them to new array
        $output = array_slice($new_array, -2, 2);
        return $output;

    }

    twoOldestAges([1, 3, 10, 0] )

    ?>


</body>

</html>