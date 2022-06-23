<?php

if(isset($_POST['submit'])){

   $name = array("Edwin", "Maria", "Michaela");

   $max = 10;
   $min = 5;

   $username = $_POST['username'];
   $password = $_POST['password'];

    if(strlen($username) > $max && strlen($username) < $min ){
        echo "Username has to be longer than 5 and shorter than 10";
    }

    if(!in_array($username, $name)){
        echo "Sorry you are not allowed";
    }else{
        echo "Welcome";
    }

}

?>