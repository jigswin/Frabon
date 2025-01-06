<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Delivery Boy Edit</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="plugins/dropify/dropify.min.css">
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
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
                        <h3 class="float-left">Edit Delivery Boy</h3>
                    </div>
                </div>
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content pb-5">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" method="post" class="section general-info">
                                        <div class="info">

                                            <?php $query = mysqli_query($con, "SELECT * FROM `delivery_boy` WHERE id = '{$_GET['id']}' ");
                                            $row = mysqli_fetch_assoc($query); ?>

                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text" name="name" class="form-control mb-4 S5hPk" id="name" placeholder="Enter Name" value="<?php echo $row['name'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="text" class="form-control mb-4 S5hPk" id="email" placeholder="Enter Email" value="<?php echo $row['email'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="mobile">Mobile No</label>
                                                                            <input type="text" class="form-control mb-4 S5hPk" id="mobile" placeholder="Enter Mobile No" value="<?php echo $row['mobile'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6"></div>

                                                                    <div class="col-sm-6">
                                                                        <div class="widget-content widget-content-area p-1">
                                                                            <div class="custom-file-container" data-upload-id="image">
                                                                                <label>Upload Profile Picture<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                                <label class="custom-file-container__custom-file" >
                                                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                                </label>
                                                                                <div class="preview-wrap">
                                                                                    <div class="old-image-preview">
                                                                                        <div class="c-image">Current Profile Picture</div>
                                                                                        <img class="preview-img" src="images/profile/<?php echo $row['profile_pic'] ?>" style="width: 70px !important;">
                                                                                    </div>
                                                                                    <div class="custom-file-container__image-preview" id="iFfxy"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group p-1">
                                                                            <label for="address">Address</label>
                                                                            <textarea class="form-control mb-4 S5hPk" id="address" rows="5" placeholder="Enter Address"><?php echo $row['address'] ?></textarea>
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <h6 class="mt-3">Vehicle Details</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="licence">Licence No</label>
                                                                            <input type="text" class="form-control mb-4 S5hPk" id="licence" placeholder="Enter Licence No" value="<?php echo $row['licence_no'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="vehicle">Vehicle No</label>
                                                                            <input type="text" class="form-control mb-4 S5hPk" id="vehicle" placeholder="Enter Vehicle No" value="<?php echo $row['vehicle_no'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <h6 class="mt-3">Delivery Area</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <div class="O6ed0">

                                                                            <?php $array = explode(',',$row['area']);
                                                                                $query = mysqli_query($con, "SELECT * FROM `delivery_area` ");
                                                                                while($row = mysqli_fetch_assoc($query)) { ?>
                                                                                    <div class="OB1JT <?php if(in_array($row['name'], $array)) echo "checked" ?>"><?php echo ucfirst($row['name']) ?>
                                                                                        <input type="checkbox" class="k7It4" <?php if(in_array($row['name'], $array)) echo "Checked" ?> value="<?php echo $row['name'] ?>">
                                                                                    </div>  
                                                                            <?php } ?>

                                                                            </div>
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
    <script src="assets/js/pages/delivery-boy.js"></script>
    
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

    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        var image = new FileUploadWithPreview('image');
        var type = 'single';
    </script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>