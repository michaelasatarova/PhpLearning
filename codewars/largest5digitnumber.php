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
    In the following 6 digit number:
    283910
    91 is the greatest sequence of 2 consecutive digits.

    In the following 10 digit number:

    1234567890
    67890 is the greatest sequence of 5 consecutive digits.

    Complete the solution so that it returns the greatest sequence of five consecutive digits found within the number given.
     The number will be passed in as a string of only digits. It should return a five digit integer. The number passed may be as large as 1000 digits.
    </pre>

    <?php

    function solution($s)
    {
        $max = 0;
        for($i = 0; $i <= strlen($s) - 5; ++$i) {
          $number = substr($s, $i, 5);
          echo $number;
          echo "<br>";
          if($number > $max) {
            $max = $number;
          }
        }
        echo "max:" . $max;


    }

    solution("12345678987653155");

    ?>
</body>

</html>