<?php session_start(); error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Pages </title>
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
                        <div onclick="location.href='support';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Support</h6>
                                    </div>
                                </div>
                                <div class="w-content">
                                    <div class="">                                                 
                                        <a class="btn btn-primary float-center">Support</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='terms-conditions';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Terms Conditions</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-canter">Terms Conditions</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='privacy-policy';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Privacy Policy</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">Privacy Policy</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='payment';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Payment</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">
                                    <a class="btn btn-primary float-center">Payment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='theme';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Theme</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">Theme</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='licence';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Licence</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">Licence</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='userlog';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>User Log</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">User Log</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='log';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Log</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">Log</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='contact_us';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Terms Conditions</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-canter">Contact us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div onclick="location.href='settings';" style="cursor: pointer;" class="widget widget-five hov">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Settings</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center">Settings</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 pb-3">
                        <div class="widget widget-five">
                            <div class="widget-content">

                                <div class="header">
                                    <div class="header-body">
                                        <h6>Create Ticket</h6>
                                    </div>
                                </div>

                                <div class="w-content">
                                    <div class="">            
                                    <a class="btn btn-primary float-center" href="support-add">Create Ticket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
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