<?php include 'includes/header.php' ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'includes/navigation.php' ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $_SESSION['username']; ?>
                        <small>Subheading</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Blank Page
                        </li>
                    </ol>

                    <!-- dashboard-->
           

                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php

                                            $query = "SELECT * FROM posts";
                                            $select_all_post = mysqli_query($connection, $query);
                                            $post_counts = mysqli_num_rows($select_all_post);

                                            ?>
                                            <div class='huge'><?php echo $post_counts ?></div>
                                            <div>Posts</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="posts.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php

                                            $query = "SELECT * FROM comments";
                                            $select_all_commets = mysqli_query($connection, $query);
                                            $commets_counts = mysqli_num_rows($select_all_commets);

                                            ?>
                                            <div class='huge'><?php echo  $commets_counts ?></div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php

                                            $query = "SELECT * FROM users";
                                            $select_all_users = mysqli_query($connection, $query);
                                            $users_counts = mysqli_num_rows($select_all_users);

                                            ?>
                                            <div class='huge'><?php echo  $users_counts ?></div>
                                            <div> Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php

                                            $query = "SELECT * FROM categories";
                                            $select_all_categories = mysqli_query($connection, $query);
                                            $categories_counts = mysqli_num_rows($select_all_categories);

                                            ?>
                                            <div class='huge'><?php echo  $categories_counts ?></div>
                                            <div>Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- /dashboard-->

                    <?php
                    
                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $select_all_draft_posts = mysqli_query($connection, $query);
                    $post_draft_count = mysqli_num_rows($select_all_draft_posts);
                    
                    $query = "SELECT * FROM comments WHERE comment_status = 'unaproved'";
                    $select_all_unaproved_comments = mysqli_query($connection, $query);
                    $unaproved_comments_count = mysqli_num_rows($select_all_unaproved_comments);
                    ?>

                    <!-- google chart bar-->
                    <script type="text/javascript">
                        google.charts.load('current', {
                            'packages': ['bar']
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],

                                <?php
                                
                                $element_text = ['Active Posts','Draft Posts', 'Categories', 'Users', 'Comments', 'Unaproved Commets'];
                                $element_count = [$post_counts, $post_draft_count, $categories_counts, $users_counts, $commets_counts, $unaproved_comments_count];

                                for($i = 0; $i < count($element_text); $i++){
                                        echo "['{$element_text[$i]}'" .  "," . "{$element_count[$i]}],";
                                }

                                ?>
                            ]);

                            var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>

                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                    <!--/ google chart bar-->

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>

<?php include 'includes/footer.php' ?>