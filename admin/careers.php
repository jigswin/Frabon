<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Careers</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
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

                <div class="layout-spacing">

                    <!-- Content -->
                    <div class="page-header">
                        <div class="page-title w-100">
                            <h3 class="float-left">Posted Jobs</h3>
                            <a href="post-job" class="btn btn-primary float-right">Post Job</a>
                        </div>
                    </div>
                            <div class="d-flex flex-wrap container mt-3 iCcAt">

                            <?php $query = mysqli_query($con, "SELECT * FROM `job` ");
                                while($row = mysqli_fetch_assoc($query)) { ?>

                                <div class="col-sm-4 p-2 useTC">
                                    <div class="widget-content widget-content-area h-100 py-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="m-0 text-warning"><?php echo $row['title'] ?></h5>
                                            <a href="edit-job?id=<?php echo $row['id'] ?>" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                        </div>
                                        <p>₹<?php echo $row['min_salary'] ?> - ₹<?php echo $row['max_salary'] ?> | <?php echo $row['location'] ?></p>
                                        <p>No Of Openings : <?php echo $row['vacancy'] ?></p>
                                        <p>Description : </p>
                                        <div class="RJrdh">
                                            <?php echo $row['description'] ?>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-center mt-3 mb-2 DN8rD">
                                            <a href="detail-job?id=<?php echo $row['id'] ?>" class="btn btn-primary">View</a>
                                            <a href="javascript:;" data-i="<?php echo $row['id'] ?>" class="btn btn-warning ES9Xr"><?php echo $row['status'] == 1 ? "Deactivate" : "Activate" ?></a>
                                            <a href="javascript:;" data-i="<?php echo $row['id'] ?>" class="btn btn-danger P6ROS">Delete</a>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>

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
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="assets/js/pages/careers.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>