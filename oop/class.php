<?php

class Car {
    public $wheels = 4;
    protected $hood = 1;
    private $engine = 1;
    static $doors = 4;
    
    function MoveWheels(){
        echo "Wheels Move";
    }
    function __construct(){
        echo $this -> wheels = 10;
    }

}
echo Car::$doors;

$bmw = new Car();
$mercedes = new Car();

$bmw -> MoveWheels();
echo $bmw ->wheels;

// if(class_exists("Car")){
//     echo "It exist";
// }else{
//     echo "no";
// }


class Plane extends Car{

}

$jet = new Plane();
echo $jet ->wheels;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
</head>
<body>
    
</body>
</html>