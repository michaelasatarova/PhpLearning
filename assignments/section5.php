<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 5 </title>
</head>
<body>
    <h2>Use some Math gunction</h2>
    <?php
        echo pow(2,7);
    ?>
    <h2>Use some String gunction</h2>
    <?php
        $vztah = "Moj vztah je na piču";
        echo strlen($vztah);
    ?>
    <h2>Use some Array gunction</h2>
    <?php
        $dlzka = [1, 3, 5, 8, 12];
        echo min($dlzka);
    ?>
    
</body>
</html>