<?php session_start(); error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Dashboard </title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="assets/js/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="alt-menu">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->

    <?php include "assets/include/header.php" ?>
    
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        
        <?php include "assets/include/sidebar.php" ?>

        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->

        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="row layout-top-spacing">

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Banners</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown  custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                                <a class="dropdown-item" href="banner-add">Add</a>
                                                <a class="dropdown-item" href="banner">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                        <?php 
                                            $query1 = mysqli_query($con, "SELECT * FROM `banner` ");
                                            $query2 = mysqli_query($con, "SELECT * FROM `banner` WHERE status = 1 ");
                                            $query3 = mysqli_query($con, "SELECT * FROM `banner` WHERE status = 0 ");
                                        ?>                                
                                        <p class="task-left"><?php echo mysqli_num_rows($query1) ?></p>
                                        <p class="task-completed"><span><?php echo mysqli_num_rows($query2) ?> Active</span></p>
                                        <p class="task-hight-priority"><span><?php echo mysqli_num_rows($query3) ?> Deactive</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Categorys</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown  custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                                <a class="dropdown-item" href="category-add">Add</a>
                                                <a class="dropdown-item" href="category">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                        <?php 
                                            $query1 = mysqli_query($con, "SELECT * FROM `category` ");
                                            $query2 = mysqli_query($con, "SELECT * FROM `category` WHERE status = 1 ");
                                            $query3 = mysqli_query($con, "SELECT * FROM `category` WHERE status = 0 ");
                                        ?>                                
                                        <p class="task-left"><?php echo mysqli_num_rows($query1) ?></p>
                                        <p class="task-completed"><span><?php echo mysqli_num_rows($query2) ?> Active</span></p>
                                        <p class="task-hight-priority"><span><?php echo mysqli_num_rows($query3) ?> Deactive</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Products</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown  custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                                <a class="dropdown-item" href="product-add">Add</a>
                                                <a class="dropdown-item" href="product">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                        <?php 
                                            $query1 = mysqli_query($con, "SELECT * FROM `product` ");
                                            $query2 = mysqli_query($con, "SELECT * FROM `product` WHERE status = 1 ");
                                            $query3 = mysqli_query($con, "SELECT * FROM `product` WHERE status = 0 ");
                                        ?>                                
                                        <p class="task-left"><?php echo mysqli_num_rows($query1) ?></p>
                                        <p class="task-completed"><span><?php echo mysqli_num_rows($query2) ?> Active</span></p>
                                        <p class="task-hight-priority"><span><?php echo mysqli_num_rows($query3) ?> Deactive</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Gallery</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown  custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                                <a class="dropdown-item" href="gallery-add">Add</a>
                                                <a class="dropdown-item" href="gallery">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">
                                        <?php 
                                            $query1 = mysqli_query($con, "SELECT * FROM `gallery` ");
                                        ?>                                
                                        <p class="task-left"><?php echo mysqli_num_rows($query1) ?></p>
                                        <p class="task-completed"><span><?php echo mysqli_num_rows($query1) ?> Active</span></p>
                                        <p class="task-hight-priority"><span>0 Deactive</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Brochures</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown  custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                                <a class="dropdown-item" href="brochure-add">Add</a>
                                                <a class="dropdown-item" href="brochure">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                        <?php 
                                            $query1 = mysqli_query($con, "SELECT * FROM `brochure` ");
                                            $query2 = mysqli_query($con, "SELECT * FROM `brochure` WHERE status = 1 ");
                                            $query3 = mysqli_query($con, "SELECT * FROM `brochure` WHERE status = 0 ");
                                        ?>                                
                                        <p class="task-left"><?php echo mysqli_num_rows($query1) ?></p>
                                        <p class="task-completed"><span><?php echo mysqli_num_rows($query2) ?> Active</span></p>
                                        <p class="task-hight-priority"><span><?php echo mysqli_num_rows($query3) ?> Deactive</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Videos</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown  custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask">
                                                <a class="dropdown-item" href="video-add">Add</a>
                                                <a class="dropdown-item" href="video">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                        <?php 
                                            $query1 = mysqli_query($con, "SELECT * FROM `video` ");
                                            $query2 = mysqli_query($con, "SELECT * FROM `video` WHERE status = 1 ");
                                            $query3 = mysqli_query($con, "SELECT * FROM `video` WHERE status = 0 ");
                                        ?>                                
                                        <p class="task-left"><?php echo mysqli_num_rows($query1) ?></p>
                                        <p class="task-completed"><span><?php echo mysqli_num_rows($query2) ?> Active</span></p>
                                        <p class="task-hight-priority"><span><?php echo mysqli_num_rows($query3) ?> Deactive</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/dashboard/dash_1.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



</body>
</html>