<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Edit Job</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
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
                        <h3 class="float-left">Edit Job</h3>
                    </div>
                </div>
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" method="post" class="section general-info">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
                                                            <div class="">
                                                                <div class="row">

                                                                <?php $query = mysqli_query($con, "SELECT * FROM `job` WHERE id = '{$_GET['id']}' ");
                                                                    $row = mysqli_fetch_assoc($query); ?>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="title">Job Title</label>
                                                                            <input type="text" name="title" class="form-control mb-4 S5hPk" id="title" placeholder="Enter Job Title" value="<?php echo $row['title'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="vacancy">No of Vacancy</label>
                                                                            <input type="text" name="vacancy" class="form-control mb-4 S5hPk" id="vacancy" placeholder="Enter No of Vacancy" value="<?php echo $row['vacancy'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="min_salary">Min Salary</label>
                                                                            <input type="text" name="min_salary" class="form-control mb-4 S5hPk" id="min_salary" placeholder="Enter Min Salary" value="<?php echo $row['min_salary'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="max_salary">Max Salary</label>
                                                                            <input type="text" name="max_salary" class="form-control mb-4 S5hPk" id="max_salary" placeholder="Enter Max Salary" value="<?php echo $row['max_salary'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="location">Location</label>
                                                                            <input type="text" name="location" class="form-control mb-4 S5hPk" id="location" placeholder="Enter Location" value="<?php echo $row['location'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="education">Education</label>
                                                                            <input type="text" name="education" class="form-control mb-4 S5hPk" id="education" placeholder="Enter Education" value="<?php echo $row['education'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="work_days">Work Days</label>
                                                                            <input type="text" name="work_days" class="form-control mb-4 S5hPk" id="work_days" placeholder="Enter Work Days" value="<?php echo $row['work_days'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="timings">Timings</label>
                                                                            <input type="text" name="timings" class="form-control mb-4 S5hPk" id="timings" placeholder="Enter Timings" value="<?php echo $row['timings'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Job Type</label><br>
                                                                            <input type="radio" name="jobtype" class="mb-4" id="ft_type" value="Full Time" style="height: 20px;width: 20px;" <?php if($row['type'] == "Full Time") echo "Checked" ?>>&nbsp;&nbsp;<label for="ft_type" style="transform: translateY(-4px);"><b>Full Time</b></label>&nbsp;&nbsp;&nbsp;
                                                                            <input type="radio" name="jobtype" class="mb-4" id="pt_type" value="Part Time" style="height: 20px;width: 20px;" <?php if($row['type'] == "Part Time") echo "Checked" ?>>&nbsp;&nbsp;<label for="pt_type" style="transform: translateY(-4px);"><b>Part Time</b></label>
                                                                            <div class="LMNEu vGOBh d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Gender</label><br>
                                                                            <input type="radio" name="gender" class="mb-4" id="m_gender" value="Male" style="height: 20px;width: 20px;" <?php if($row['gender'] == "Male") echo "Checked" ?>>&nbsp;&nbsp;<label for="m_gender" style="transform: translateY(-4px);"><b>Male</b></label>&nbsp;&nbsp;&nbsp;
                                                                            <input type="radio" name="gender" class="mb-4" id="f_gender" value="Female" style="height: 20px;width: 20px;" <?php if($row['gender'] == "Female") echo "Checked" ?>>&nbsp;&nbsp;<label for="f_gender" style="transform: translateY(-4px);"><b>Female</b></label>&nbsp;&nbsp;&nbsp;
                                                                            <input type="radio" name="gender" class="mb-4" id="b_gender" value="Both" style="height: 20px;width: 20px;" <?php if($row['gender'] == "Both") echo "Checked" ?>>&nbsp;&nbsp;<label for="b_gender" style="transform: translateY(-4px);"><b>Both</b></label>
                                                                            <div class="LMNEu PQxTN d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="experience">Experience</label>
                                                                            <input type="text" name="experience" class="form-control mb-4 S5hPk" id="experience" placeholder="Enter Experience" value="<?php echo $row['experience'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12 h-100">
                                                                        <div class="statbox widget box box-shadow">
                                                                            <div class="widget-header">
                                                                                <div class="row">
                                                                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                                        <h4>Description</h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="widget-content widget-content-area">
                                                                                
                                                                                <div id="editor-container"></div>
                                                                                
                                                                                <div class="tmp-code d-none"><?php echo $row['description'] ?></div>
                                                                                
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
    <script src="assets/js/pages/careers.js"></script>
    
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

    <script src="plugins/editors/quill/quill.js"></script>
    <script src="plugins/editors/quill/custom-quill.js"></script>
    
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>