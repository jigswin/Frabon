<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Job Details</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <style>
        td {
            vertical-align: baseline;
            padding: 5px;
            color: #000;
        }
        .xO4Pk {
            
        }
        .OlbG6 {
            margin: 0 15px;
            padding: 15px 0;
            cursor: pointer;
            color: #000;
        }
        .OlbG6.active {
            border-bottom: 2px solid #3cba92;
        }
        .LO10B {
            display: none;
        }
        .LO10B.active {
            display: block;
        }
        .nJ3lS {
            display: flex;
            width: 150px;
            flex-wrap: wrap;
            position: absolute;
            top: 45px;
            right: 15px;
            background-color: #fff;
            box-shadow: 0 2px 18px 0 rgb(6 8 24);
            border-radius: 5px;
            padding: 5px 0;
            z-index: 1;
        }
        .nJ3lS a {
            width: 100%;
            padding: 10px 15px;
        }
        .nJ3lS a:hover {
            background-color: #1b55e2;
            color:#FFF;
        }
        .title-c {
            color: #000;
            width: 150px;
            font-weight: bold;
        }
        @media screen and (max-width: 500px) {
            .user-profile .widget-content-area {
                padding: 0;
            }
        }
    </style>
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
        
        <?php
            $query = mysqli_query($con, "SELECT * FROM job WHERE id = '".$_GET['id']."' ");
            $row = mysqli_fetch_assoc($query);

            $query1 = mysqli_query($con, "SELECT * FROM `job_applications` WHERE job_id = '{$_GET['id']}' ");
        ?>

        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                    <!-- Content -->
                    <div class="layout-top-spacing">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area row m-0 px-0 pb-0">
                                <div class="d-flex justify-content-between col-sm-12">
                                    <h3 class="pb-3"><?php echo $row['title'] ?></h3>
                                    
                                    <!-- <a href="javascript:;" class="btn btn-primary float-right mt-2 align-center icXJS">   
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                    Edit
                                    </a> -->
                                    <a href="javascript:;" class="edit-profile icXJS"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a>
                                    <div class="nJ3lS d-none">
                                        <a href="javascript:;" data-i="<?php echo $row['id'] ?>" class="ES9Xr"><?php echo $row['status'] == 1 ? "Deactivate" : "Activate" ?></a>
                                        <a href="javascript:;" data-i="<?php echo $row['id'] ?>" class="P6ROS">Delete</a>
                                        <a href="edit-job?id=<?php echo $row['id'] ?>" class="">Edit</a>
            
                                    </div>
                                </div>

                                <div class="xO4Pk row m-0 mt-3 w-100">
                                    <div class="OlbG6 active" data-n="1">APPLIED CANDIDATES (<?php echo mysqli_num_rows($query1) ?>)</div>
                                    <div class="OlbG6" data-n="2">JOB DETAILS</div>
                                </div>
                            </div>

                            <div class="widget-content widget-content-area row mt-3 m-0">

                                <div class="mt-2 p-3 LO10B active w-100" data-n="1">
                                    <div class="d-flex flex-wrap container mt-3 iCcAt">

                                    <?php 
                                    while($row1 = mysqli_fetch_assoc($query1)) { ?>

                                        <div class="col-sm-4 p-2 useTC">
                                            <div class="widget-content widget-content-area h-100 py-2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5 class="m-0 text-warning"><?php echo $row1['name'] ?></h5>
                                                    <a href="resume/<?php echo $row1['resume'] ?>" download class="mt-2 edit-profile"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v13M5 12l7 7 7-7"/></svg></a>
                                                </div>
                                                <p><span class="title-c">Location :</span> <?php echo ucfirst($row1['area']) ?> | <?php echo ucfirst($row1['city']) ?></p>
                                                <p><span class="title-c">Mobile :</span> <a href="tel:<?php echo $row1['mobile'] ?>" target="_blank"><?php echo $row1['mobile'] ?></a></p>
                                                <p><span class="title-c">Email :</span> <a href="mailto:<?php echo $row1['email'] ?>" target="_blank"><?php echo $row1['email'] ?></a></p>
                                                <p><span class="title-c">Education :</span> <?php echo $row1['education'] ?></p>
                                                <p><span class="title-c">Experience :</span> <?php echo $row1['experience'] ?></p>
                                                <p><span class="title-c">Applied on :</span> <?php echo $row1['date'] ?></p>
                                            </div>
                                        </div>
                                        
                                    <?php }
                                    
                                    if(mysqli_num_rows($query1) == 0) {
                                        echo "<h5 class='m-auto py-5'>No Candidates Applied</h5>";
                                    }

                                    ?>

                                    </div>
                                </div>

                                <div class="mt-2 p-3 LO10B" data-n="2">
                                    <table style="color: #e0e6ed;" colspace="10">
                                        <tr>
                                            <td class="title-c">Salary :</td>
                                            <td>₹<?php echo $row['min_salary'] ?> - ₹<?php echo $row['max_salary'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">No Of Openings :</td>
                                            <td><?php echo $row['vacancy'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Location :</td>
                                            <td><?php echo $row['location'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Working Days :</td>
                                            <td><?php echo $row['work_days'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Timings :</td>
                                            <td><?php echo $row['timings'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Education :</td>
                                            <td><?php echo $row['education'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Job Type :</td>
                                            <td><?php echo $row['type'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Experience :</td>
                                            <td><?php echo $row['experience'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Gender :</td>
                                            <td><?php echo $row['gender'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="title-c">Job Description :</td>
                                            <td><?php echo $row['description'] ?></td>
                                        </tr>
                                        
                                    </table>
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