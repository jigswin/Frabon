<?php session_start(); error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Product Add</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/users/account-setting.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />

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
                        <h3 class="float-left">Add Product</h3>

                        <a class="btn btn-primary float-right" href="product">Product List</a>
                    </div>
                </div>
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="general-info" method="post" class="section general-info">
                                        <div class="info mb-3">
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
                                                            <div class="">
                                                                <div class="row">

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text" name="name" class="form-control mb-4 S5hPk" id="name" placeholder="Enter Name">
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
                                                                                    $query = mysqli_query($con, "SELECT * FROM `category` ");
                                                                                    while($row = mysqli_fetch_assoc($query)) { 
                                                                                ?> 
                                                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                                                                <?php } ?>
                                                                                </select>  
                                                                                <div class="LMNEu OT150 d-none"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="size">Size</label>
                                                                            <input type="text" name="size" class="form-control mb-4" id="size" placeholder="Enter Size">
                                                                            <!-- <div class="LMNEu OT150 d-none"></div> -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="price">Price</label>
                                                                            <input type="text" name="price" class="form-control mb-4" id="price" placeholder="Enter Price">
                                                                            <!-- <div class="LMNEu OT150 d-none"></div> -->
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="stock">Stock</label>
                                                                            <input type="text" name="stock" class="form-control mb-4 S5hPk" id="stock" placeholder="Enter Stock">
                                                                            <div class="LMNEu OT150 d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="description">Description</label>
                                                                            <textarea name="description" class="form-control mb-4" id="description" placeholder="Enter Description" rows="3"></textarea>
                                                                            <!-- <div class="LMNEu OT150 d-none"></div> -->
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <!-- <div class="col-sm-12">
                                                                        <div class="widget-content widget-content-area p-1">
                                                                            <div class="custom-file-container" data-upload-id="image">
                                                                                <label>Upload Image (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                                <label class="custom-file-container__custom-file" >
                                                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/x-png,image/gif,image/jpeg" multiple>
                                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                                </label>
                                                                                <div class="custom-file-container__image-preview" id="iFfxy"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="info border-top">
                                            <h5 class="mt-3">Custom Fields</h5>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 mt-4">
                                                            <div class="">
                                                                <div class="row">

                                                                <?php $query = mysqli_query($con, "SELECT `COLUMN_NAME`, `COLUMN_TYPE` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='product_fields' ");
                                                                    while($row = mysqli_fetch_assoc($query)) { 
                                                                        if($row['COLUMN_NAME'] != 'id' && $row['COLUMN_NAME'] != 'prod_id') {
                                                                            $name = str_replace('_', ' ', $row['COLUMN_NAME']);
                                                                            $type = $row["COLUMN_TYPE"];
                                                                ?>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="text-capitalize" for="<?php echo $row["COLUMN_NAME"] ?>"><?php echo $name ?></label>
                                                                                <?php if($type == "varchar(255)")
                                                                                        echo '<input type="text" class="form-control mb-2 cust_field" id="'.$row["COLUMN_NAME"].'" data-c="'.$row["COLUMN_NAME"].'" placeholder="Enter '.$name.'">';
                                                                                    else if($type == "date")
                                                                                        echo '<input type="date" class="form-control mb-2 cust_field" id="'.$row["COLUMN_NAME"].'" data-c="'.$row["COLUMN_NAME"].'" placeholder="Select '.$name.'">';
                                                                                    else if($type == "text")
                                                                                        echo '<textarea class="form-control mb-2 cust_field" id="'.$row["COLUMN_NAME"].'" data-c="'.$row["COLUMN_NAME"].'" placeholder="Enter '.$name.'"></textarea>';
                                                                                    ?> 
                                                                            </div>
                                                                        </div>  
                                                                <?php } } ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="section general-info">
                                        <div class="widget-header mt-3 p-3">  
                                            <div class="custom-file-container" data-upload-id="image">
                                                <label>Upload (Allow Multiple)</label>
                                            
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

                    <div class="account-settings-footer">
                        
                        <div class="as-footer-container">

                            <button id="reset" class="btn btn-primary">Reset All</button>
                            <button id="add" class="btn btn-dark">Add Product</button>
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
    <script type="text/javascript" src="assets/js/pages/dropzone.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });

        DropZone({ acceptedFiles: 'image/*' })

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
    <!-- <script src="plugins/tagInput/tags-input.js"></script> -->
    <!--  END CUSTOM SCRIPTS FILE  -->

    
</body>
</html>