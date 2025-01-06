<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Banner Edit</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/dropzone.css" />
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
                    <div class="page-title w-100">
                        <h3 class="float-left">Edit Banner</h3>

                        <a class="btn btn-primary float-right" href="banner">Banner List</a>
                    </div>
                </div>
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            
                            <div class="row layout-top-spacing">

                            <?php 
                                $query = mysqli_query($con, "SELECT * FROM `banner` where banner_id = '".$_GET['id']."' ");
                                $row = mysqli_fetch_assoc($query); 
                            ?>

                                <div id="fuSingleFile" class="col-lg-12 layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                       
                                        <form id="general-info" method="post" class="section general-info">

                                            <div class="row px-3">
                                                <div class="col-sm-6 pt-3">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" class="form-control mb-4" id="title" placeholder="Enter Title" value="<?php echo $row['title'] ?>">
                                                        <div class="LMNEu OT150 d-none"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6 pt-3">
                                                    <div class="form-group">
                                                        <label for="button">Button Name</label>
                                                        <input type="text" name="button" class="form-control mb-4" id="button" placeholder="Enter Button Name" value="<?php echo $row['button'] ?>">
                                                        <div class="LMNEu OT150 d-none"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 pt-3">
                                                    <div class="form-group">
                                                        <label for="link">Link</label>
                                                        <input type="text" name="link" class="form-control mb-4" id="link" placeholder="Enter Link" value="<?php echo $row['link'] ?>">
                                                        <div class="LMNEu OT150 d-none"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="">
                                            <div class="widget-header mt-3 p-3">
                                                
                                                <div class="old-image-preview mb-4">
                                                    <div class="c-image mt-2">Current Image</div>
                                                    <img class="preview-img" class src="images/banner/<?php echo $row['image'] ?>" >
                                                </div>

                                                <label> Enter Image URL (Copy Image Address)</label>
                                                <br>
                                                <input type="text" class="form-control mb-2" id="img_url" placeholder="Enter Image URL">
                                                
                                                <h4>OR</h4>
                                           
                                                <div class="custom-file-container" data-upload-id="image">
                                                    <label>Upload (Allow Single)</label>
                                                
                                                    <div class="container">
                                                        <div class="file_upload">
                                                            <form action="" class="dropzone">
                                                                <div class="dz-message needsclick">
                                                                    <strong>Drop files here or Choose File & click to Add Banner.</strong><br />
                                                                </div>
                                                            </form>		
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
    <script src="assets/js/pages/banner.js"></script>
    <script type="text/javascript" src="assets/js/pages/dropzone.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();

            DropZone({ acceptedFiles: 'image/*' })
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->

    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>