<?php 
$file ="example.txt";
if($handle = fopen($file, 'w')){
    fwrite($handle, 'I love PHP');
    fclose($handle);
}else{
    echo "The application was not able to write on that file";
}

?>

