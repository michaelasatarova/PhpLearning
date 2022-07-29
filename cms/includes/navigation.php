<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index">CMS FRONT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php
                include 'db.php';

                $query = "SELECT * FROM categories";
                $select_all_categories_query = mysqli_query($connection, $query);
             
                if(!$select_all_categories_query){
                    die("Query Failed");
                }

                while($row = mysqli_fetch_row($select_all_categories_query)) {
                    $cat_title = $row[1];

                    $category_class = '';
                    $registration_class ='';

                    $pageName = basename($_SERVER['PHP_SELF']);
                    $registration = 'registration.php';

                    if(isset($_GET['category']) && $_GET['category'] == $cat_id){
                        $category_class = 'active';
                    }
                    else if( $pageName == $registration ){
                        $registration_class ='active';
                    }
                 ?>  
                    <li class="<?php  echo $category_class; ?>">
                        <a href="#"><?php  echo $cat_title; ?></a>
                    </li>
                    <?php  } ?>

                    <?php if(isLoggedIn()): ?>
                    <li>
                        <a href="admin">ADMIN</a>
                    </li>
                    <li>
                        <a href="includes/logout.php">Log out</a>
                    </li>
                    <?php else: ?>
                        <li>
                            <a href="login">LOGIN</a>
                        </li>
                        
                         <li  class="<?php  echo  $registration_class; ?>">
                            <a href="registration">REGISTRATION</a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="contact">CONTACT</a>
                    </li>
                    <?php

                    // if(isset($_SESSION['user_role'])){
                    //     if(isset($_GET['p_id'])){
                    //         $the_post_id = $_GET['p_id'];
                    //         echo " <li><a href='admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit Post</a></li>";              
                    //     }
                    // }
                    
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>