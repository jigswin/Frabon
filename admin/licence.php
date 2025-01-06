<?php session_start(); error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Licence</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
</head>
<body class="alt-menu sidebar-noneoverflow">
    
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
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="section general-info">
                                        <div class="info pt-4">

                                            <h4> Licence Info</h4>

                                            <?php 
                                                $query = "SELECT * FROM `admin` WHERE role = 'admin' ";
                                                $result = mysqli_query($con,$query);
                                                $row = mysqli_fetch_array($result);
                                                $sdate = $row['created_date'];
                                                $edate = $row['end_date'];
                                                $totalDayes = dateDiffInDays($sdate,$edate);
                                                $remainingDays = dateDiffInDays(date("Y-m-d , h:i:s"),$edate);

                                                function dateDiffInDays($date1, $date2) { 
                                                    $diff = strtotime($date2) - strtotime($date1); 
                                                    if($date1>=$date2){
                                                        return 0;
                                                    }else{
                                                        return abs(round($diff / 86400)); 
                                                    }
                                                } 
                                            ?>

                                            <div class="card-body licence">
                                                <div class="mt-3 "><b>Register Date : </b><?php echo date('d-m-Y',strtotime($sdate)) ; ?></div>
                                                <div class="mt-3"><b>Expire Date : </b><?php echo date('d-m-Y',strtotime($edate)); ?></div>
                                                <div class="mt-3"><b>Total Days : </b><?php echo $totalDayes; ?></div>
                                                <div class="mt-3"><b>Remaing Days : </b><?php echo $remainingDays; ?></div>
                                            </div>

                                            <?php if( $remainingDays == 0){ ?>
                                            <div class="pb-3">
                                                <a href="https://pay.addealindia.com" target="_blank"><button class="btn btn-warning m-3">Pay Now</button></a>
                                            </div>
                                            <?php } ?>
                                            
                                        </div>
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
    <script src="assets/js/pages/role.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="plugins/dropify/dropify.min.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <!--  END CUSTOM SCRIPTS FILE  -->

    
</body>
</html>