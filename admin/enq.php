<?php session_start(); error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Enquery </title>
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
                        <div onclick="location.href='enquiry';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">
                                <div class="header">
                                    <div class="header-body">
                                        <h6>Enquiry</h6>
                                    </div>
                                </div>
                                <div class="w-content">
                                    <div class="">                                                 
                                        <a class="btn btn-primary float-center">Enquiry</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='contact';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Contact</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-canter">Contact</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='appointment';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Appointment</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='feedback';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Feedback</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">
                                    <a class="btn btn-primary float-center">Feedback</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='subscriber';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Subscriber</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">Subscriber</a>
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