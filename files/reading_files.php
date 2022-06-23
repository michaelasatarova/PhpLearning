<?php 
$file ="example.txt";
if($handle = fopen($file, 'r')){
   echo $content = fread($handle, 10); //Each bite == character
   fclose($handle);

}else{
    echo "The application was not able to write on that file";
}

?>

