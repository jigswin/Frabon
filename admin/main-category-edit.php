<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Main Category Edit</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
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
                
                <div class="page-header">
                    <div class="page-title">
                        <h3 class="float-left">Edit Main Category</h3>
                    </div>
                </div>
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content pb-5">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" method="post" class="section general-info">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                            <div class="">
                                                                <div class="row">

                                                                <?php 
                                                                    $query = mysqli_query($con, "SELECT * FROM `main_category` where id = '".$_GET['id']."' ");
                                                                    $row = mysqli_fetch_assoc($query); 
                                                                ?>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text" name="name" class="form-control mb-4 S5hPk" id="name" placeholder="Enter Name" value="<?php echo $row['name'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-sm-6">
                                                                        <label for="status" class="dob-input">Status</label>
                                                                        <div class="d-block">
                                                                            <div class="form-group mr-1">
                                                                                <select class="form-control mb-4 S5hPk" id="status" placeholder="Select Status">
                                                                                    <option value="1" <?php echo $row['status'] == 1 ? "Selected" : "" ?>>Active</option>
                                                                                    <option value="0" <?php echo $row['status'] == 0 ? "Selected" : "" ?>>Deactive</option>
                                                                                </select>  
                                                                                <div class="LMNEu OT150 d-none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="account-settings-footer">
                        
                        <div class="as-footer-container">

                            <button id="reset" class="btn btn-primary">Reset All</button>
                            <button id="update" class="btn btn-dark">Save Changes</button>
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
    <script src="assets/js/pages/main-category.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="plugins/highlight/highlight.pack.js"></script>

    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>