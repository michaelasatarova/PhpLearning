<?php

class Dog{
    var $legs = 4;
    var $color = "brown";
    var $tang = true;

    function showAll(){
       echo $this -> legs;
       echo $this -> color;
       echo $this -> tang;
    }
}

$doberman = new Dog();
$doberman -> showAll();

?>