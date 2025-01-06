<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Settings</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
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
                    
                <div class="account-settings-container layout-top-spacing">

                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <form id="general-info">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="section general-info">
                                            <div class="info">
                                                <h6 class="pt-3">Personal Information</h6>
                                                <div class="row">
                                                    <div class="col-lg-11 mx-auto">
                                                        <div class="row">
                                                            
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="pname">Name</label>
                                                                    <input type="text" class="form-control mb-4" id="pname" placeholder="Name" value="<?php echo $user_data['name'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="pphone">Phone</label>
                                                                    <input type="text" class="form-control mb-4" id="pphone" readonly placeholder="Write your phone number here" value="<?php echo $user_data['mobile'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="pemail">Email</label>
                                                                    <input type="text" class="form-control mb-4" id="pemail" readonly placeholder="Write your email here" value="<?php echo $user_data['email'] ?>">
                                                                </div>
                                                            </div>  

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php 
                                    if($_SESSION['user_type'] == "Admin") {
                                        
                                        $query = mysqli_query($con, "SELECT * FROM `detail` ");
                                        $row = mysqli_fetch_assoc($query); ?>

                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing A25Fy">
                                        <div class="section general-info">
                                            <div class="info">
                                            <h6 class="pt-3">Company Information</h6>
                                                <div class="row">
                                                    <div class="col-lg-11 mx-auto">
                                                        <div class="row">

                                                            <div class="custom-file-container col-sm-12 mb-4" data-upload-id="image">
                                                                <label>Logo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                <label class="custom-file-container__custom-file" >
                                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/x-png,image/gif,image/jpeg">
                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                </label>
                                                                <div class="preview-wrap">
                                                                    <div class="old-image-preview">
                                                                        <div class="c-image">Current Logo</div>
                                                                        <img style="width: 150px" src="images/logo/<?php echo $row['logo'] ?>" >
                                                                    </div>
                                                                    <div class="custom-file-container__image-preview" id="iFfxy"></div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Company Name</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="name" placeholder="Enter Company Name" value="<?php echo $row['name'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="email" placeholder="Enter Email ID" value="<?php echo $row['email'] ?>">
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="mobile">Mobile</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="mobile" placeholder="Enter Mobile No" value="<?php echo $row['mobile'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="whatsapp">Whatsapp</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="whatsapp" placeholder="Enter Whatsapp No" value="<?php echo $row['whatsapp'] ?>">
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="address">Address</label>
                                                                    <textarea class="form-control mb-4 HnpC3" id="address" rows="3" placeholder="Enter Address"><?php echo $row['address'] ?></textarea>
                                                                </div>
                                                            </div> 
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="shortadd">Short Address</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="shortadd" placeholder="Ex: Ashram Rd, Ahmedabad, Gujarat" value="<?php echo $row['shortadd'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="gst">GST No</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="gst" placeholder="Enter GST No" value="<?php echo $row['gst'] ?>">
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="city">City</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="city" placeholder="Enter City" value="<?php echo $row['city'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="state">State</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="state" placeholder="Enter State" value="<?php echo $row['state'] ?>">
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="location">Map Share Link</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="location" placeholder="Enter Map Share Link" value="<?php echo $row['location'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="website">Website</label>
                                                                    <input type="text" class="form-control mb-4 HnpC3" id="website" placeholder="Enter Website Link" value="<?php echo $row['website'] ?>">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="map_link">Embed map Link</label>
                                                                    <textarea rows=5 class="form-control mb-4 HnpC3" id="map_link" placeholder="Enter Embed map Link"><?php echo $row['map_link'] ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="website">Contact Banner (Size 1200 x 300)</label>
                                                                    <input type="file" name="file" class="form-control mb-4" id="bannerImg" onchange="loadImage(event)" placeholder="Select File" accept="image/x-png,image/gif,image/jpeg">
                                                                    <label>Current Image</label><br>
                                                                    <img src="images/contact/<?php echo $row['banner'] ?>" width="200" alt="">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="section general-info">
                                            <div class="info">
                                                <h6 class="pt-3">Social Media</h6>
                                                <div class="row">
                                                    <div class="col-lg-11 mx-auto">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="facebook">Facebook</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="facebook" placeholder="Facebook Link" value="<?php echo $row['facebook'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="fb_active" <?php echo $row['fb_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="messenger">Messenger</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="messenger" placeholder="Messenger Link" value="<?php echo $row['messenger'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="messenger_active" <?php echo $row['messenger_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="instagram">Instagram</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="instagram" placeholder="Instagram Link" value="<?php echo $row['instagram'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="insta_active" <?php echo $row['insta_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="youtube">Youtube</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="youtube" placeholder="Youtube Link" value="<?php echo $row['youtube'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="youtube_active" <?php echo $row['youtube_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="linkedin">Linkedin</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="linkedin" placeholder="Linkedin Link" value="<?php echo $row['linkedin'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="linkedin_active" <?php echo $row['linkedin_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="twitter">Twitter</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="twitter" placeholder="Twitter Link" value="<?php echo $row['twitter'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="twitter_active" <?php echo $row['twitter_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="gbusiness">Google Business</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="gbusiness" placeholder="Google Business Link" value="<?php echo $row['gbusiness'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="gbusi_active" <?php echo $row['gbusi_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wbusiness">Whatsapp Business</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="wbusiness" placeholder="Whatsapp Business Link" value="<?php echo $row['wbusiness'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="wbusi_active" <?php echo $row['wbusi_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="gmeet">Google Meet</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="gmeet" placeholder="Google Meet Link" value="<?php echo $row['gmeet'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="meet_active" <?php echo $row['meet_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="skype">Skype</label>
                                                                    <div class="input-group mb-4">
                                                                        <input type="text" class="form-control HnpC3" id="skype" placeholder="Skype Link" value="<?php echo $row['skype'] ?>">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text">
                                                                                <label class="switch s-danger mb-0">
                                                                                    <input type="checkbox" class="ONfDK" id="skype_active" <?php echo $row['skype_active'] == 1 ? "checked" : "" ?> >
                                                                                    <span class="slider round"></span>
                                                                                </label>
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

                                    <?php } ?>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="account-settings-footer">
                        
                        <div class="as-footer-container">

                            <button id="reset" class="btn btn-primary">Reset All</button>
                            <button id="save" class="btn btn-dark">Save Changes</button>
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
    <script src="assets/js/pages/settings.js"></script>

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

    <?php if($_SESSION['user_type'] == "Admin") { ?>
    <script>
        var image = new FileUploadWithPreview('image');
        var type = 'single';
    </script>
    <?php } ?>
    <!--  END CUSTOM SCRIPTS FILE  -->
</body>
</html>