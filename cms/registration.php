<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php include 'admin/functions.php' ?>

 <?php

//SENDING LANGUAGE VARIABLES

if(isset($_GET['lang']) && !empty($_GET['lang'])){
   $_SESSION['lang'] = $_GET['lang'];
   
   if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_GET['lang']){

    echo "<script type='text/javascript'> location.reload();</script>";
   }

}

    if(isset($_GET['lang'])){
        include "includes/languages/".$_SESSION['lang'].".php";
   }
   else{
    include "includes/languages/en.php";
   }

 // REGISTRATION
 if(isset($_POST['submit'])){

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = [
        'usernsme' => '',
        'email' => '',
        'password' => ''
    ];



    $message = "";

    //validation

    if($username == ''){
      $message = 'Username can´t be empty';
    }
    elseif(strlen($username) < 4){
      $message = 'Username needs to be longer';
    }
    elseif(username_exists($username)){
      $message = 'Username already exist. <a href="index.php"> Login </a>>';
    }
    elseif($email == ''){
        $message = 'Email can´t be empty';
    }
    elseif($password == ''){
        $message = 'Password can´t be empty';
    }
    else{
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        if(!empty($username) && !empty($password) && !empty($email)){
    
            $query = "SELECT randSalt FROM users";
            $select_randsalt_query = mysqli_query($connection, $query);
        
            confirm($select_randsalt_query);
        
            $row = mysqli_fetch_array($select_randsalt_query);
            $salt = $row['randSalt'];
            
    
            $password = crypt($password, $salt);
        
            $query = "INSERT INTO users (username, user_email, user_password, user_role) VALUES('{$username}', '{$email}', '{$password}', 'subscriber')";
            $register_user_query = mysqli_query($connection, $query);
            confirm($register_user_query);
            $message = "Your Registration has been submited";
        }else{
            $message = "Fields can´t be empty";
        }

    }
 }

 
 
 ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?> 
 
    <!-- Page Content -->
    <div class="container">


    <form method="get" id="language_form" class="navbar-form navbar-right" action="">
        <div class="form-group">
            <select name="lang"  class="form-control" onchange="changeLanguage()">
                <option value="en" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){echo "selected" ;}?> >English</option>
                <option value="svk" <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'svk'){echo "selected" ;}?> >Slovensky</option>
            </select>
        </div>
    </form>

    
    
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1><?php echo _REGISTER; ?></h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <p><?php echo $message; ?></p>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="<?php echo _NAME; ?>">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo _EMAIL; ?>">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="<?php echo _PASSWORD; ?>">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="<?php echo _REGISTER; ?>">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

 <hr>

 <script>
    function changeLanguage(){
        document.getElementById("language_form").submit();
    }
 </script>


<?php include "includes/footer.php";?>
