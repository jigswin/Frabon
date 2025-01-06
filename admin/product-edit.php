<?php session_start(); error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Product Edit</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
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
                        <h3 class="float-left">Edit Product</h3>
                    </div>
                </div>
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" method="post" class="section general-info hsl38">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
                                                            <div class="">
                                                                <div class="row">

                                                                <?php 
                                                                    $query = mysqli_query($con, "SELECT * FROM `product` where id = '".$_GET['id']."' ");
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
                                                                        <label for="category" class="dob-input">Category</label>
                                                                        <div class="d-block">
                                                                            <div class="form-group mr-1">
                                                                                <select class="form-control mb-4 S5hPk" id="category" placeholder="Select Category">
                                                                                    <option value="">Select</option>
                                                                                <?php 
                                                                                    $query1 = mysqli_query($con, "SELECT * FROM `category` ");
                                                                                    while($row1 = mysqli_fetch_assoc($query1)) { 
                                                                                ?> 
                                                                                    <option value="<?php echo $row1['id'] ?>" <?php echo $row['cat_id'] == $row1['id'] ? "Selected" : "" ?>><?php echo $row1['name'] ?></option>
                                                                                <?php } ?>
                                                                                </select>  
                                                                                <div class="LMNEu OT150 d-none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="size">Size</label>
                                                                            <input type="text" name="size" class="form-control mb-4 S5hPk" id="size" placeholder="Enter Size" value="<?php echo $row['size'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="price">Price</label>
                                                                            <input type="text" name="price" class="form-control mb-4 S5hPk" id="price" placeholder="Enter Price" value="<?php echo $row['price'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="stock">Stock</label>
                                                                            <input type="text" name="stock" class="form-control mb-4 S5hPk" id="stock" placeholder="Enter Stock" value="<?php echo $row['stock'] ?>">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="description">Description</label>
                                                                            <textarea name="description" class="form-control mb-4 S5hPk" id="description" placeholder="Enter Description" rows="3"><?php echo $row['description'] ?></textarea>
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div id="fuSingleFile" class="col-lg-12 layout-spacing">
                                                                        <div class="statbox widget box box-shadow">
                                                                            <div class="widget-content widget-content-area">
                                                                            <div class="custom-file-container" data-upload-id="image">
                                                                                <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                                <label class="custom-file-container__custom-file" >
                                                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/x-png,image/gif,image/jpeg" multiple>
                                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                                </label>
                                                                                <div class="preview-wrap">
                                                                                    <div class="old-image-preview">
                                                                                        <div class="c-image">Current Images</div>
                                                                                        <?php 
                                                                                            $qry = mysqli_query($con, "SELECT * FROM `product_image` WHERE pro_id = '{$row['id']}' ");
                                                                                            while($img = mysqli_fetch_assoc($qry)) { 
                                                                                        ?> 
                                                                                        <div class="IHO08" data-id="<?php echo $img['id'] ?>">
                                                                                            <label class="new-control new-checkbox checkbox-outline-info m-auto DdtmX"><input type="checkbox" class="new-control-input child-chk"><span class="new-control-indicator"></span><span style="visibility:hidden">c</span></label>
                                                                                            <img src="images/product/<?php echo $img['image'] ?>" >
                                                                                        </div>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <div class="custom-file-container__image-preview" id="iFfxy"></div>
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
    <script src="assets/js/pages/product.js"></script>
    
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
    
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/file-upload/file-upload-with-preview.min.js"></script>

    <script>
        var image = new FileUploadWithPreview('image');
        var type = 'multiple';
    </script>
    <!--  END CUSTOM SCRIPTS FILE  -->

    
</body>
</html>