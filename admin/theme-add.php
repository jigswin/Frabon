<?php session_start(); error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Theme Add</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="assets/css/elements/color_library.css" rel="stylesheet" type="text/css" />

    <style>
        .col {
            min-width: auto;
        }
    </style>
    <!--  END CUSTOM STYLE FILE  -->    
</head>
<body class="alt-menu sidebar-noneoverflow" data-spy="scroll" data-target="#navSection" data-offset="140">
    
    <!--  BEGIN NAVBAR  -->
    
    <?php include "assets/include/header.php" ?>

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <div class="sidenav-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        
        <?php include "assets/include/sidebar.php" ?>

        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">

            <div class="theme-container">

                <div class="page-header">
                    <div class="page-title w-100">
                        <h3 class="float-left pl-3">Theme Add</h3>
                    </div>
                </div>
        
                <div id="navSection" data-spy="affix" class="nav sidenav">
                    <div class="sidenav-content">
                        <a href="#colorLibHeader" class="active nav-link">Header</a>
                        <a href="#colorLibFooter" class="nav-link">Footer</a>
                        <a href="#colorLibCategory" class="nav-link">Category</a>
                        <a href="#colorLibHomeGallery" class="nav-link">Home Gallery</a>
                        <a href="#colorLibProductAll" class="nav-link">Product All</a>
                        <a href="#colorLibProduct" class="nav-link">Product Page</a>
                        <a href="#colorLibAboutUs" class="nav-link">About Us</a>
                        <a href="#colorLibServices" class="nav-link">Services</a>
                        <a href="#colorLibContactUs" class="nav-link">Contact Us</a>
                        <a href="#colorLibEnquiry" class="nav-link">Enquiry</a>
                        <a href="#colorLibPrivacyPolicy" class="nav-link">Privacy Policy</a>
                        <a href="#colorLibTermsConditions" class="nav-link">Terms & Conditions</a>
                        <a href="#colorLibTestimonial" class="nav-link">Testimonial</a>
                        <a href="#colorLibAppointment" class="nav-link">Appointment</a>
                        <a href="#colorLibFeedback" class="nav-link">Feedback</a>
                        <a href="#colorLibBrochure" class="nav-link">Brochure</a>
                        <a href="#colorLibGallery" class="nav-link">Gallery</a>
                        <a href="#colorLibPost" class="nav-link">Post</a>
                        
                    </div>
                </div>
                
                <div class="row layout-top-spacing m-0">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Theme Name</label>
                            <input type="text" name="name" class="form-control mb-4 S5hPk" id="name" placeholder="Enter Theme Name">
                            <div class="LMNEu OT150 d-none"></div>
                        </div>
                    </div>

                    <div id="colorLibHeader" class="col-lg-12 mt-1">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Header</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="header_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Header Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="com_name_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Company Name Color</h5>
                                <span>#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="add_gst_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Address & GST Color</h5>
                                <span>#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="btn_bg_h"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Buttons Background</h5>
                                <span>#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="btn_color_h"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Buttons Color</h5>
                                <span>#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="menu_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Menu Color</h5>
                                <span>#1b55e2</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row m-0">

                    <div id="colorLibFooter" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Footer</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="footer_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Footer Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="footer_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Footer Color</h5>
                                <span>#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="footer_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Footer Title Color</h5>
                                <span>#1b55e2</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row m-0">

                    <div id="colorLibCategory" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Category</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="category_sec_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Category Section Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="cat_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="category_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Category Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>       

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="cat_name_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Category Name Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>             

                </div>

                <div class="row m-0">

                    <div id="colorLibHomeGallery" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Home Gallery</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="gallery_bg_i"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Gallery Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="gallery_color_i"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="row m-0">

                    <div id="colorLibProductAll" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Product All</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="cat_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="pro_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Product Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="pro_name_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Product Name Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="pro_price_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Product Price Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibProduct" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Product Page</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="product_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="pro_detail_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Detail Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="pro_button_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="pro_button_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibAboutUs" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">About Us</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="about_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="about_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="about_detail_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Detail Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibServices" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Services</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="services_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="services_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="services_detail_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Detail Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibContactUs" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Contact Us</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="contact_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="contact_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="contact_detail_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Detail Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="contact_button_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="contact_button_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibEnquiry" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Enquiry</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="enquiry_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="enquiry_title_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="enquiry_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="enquiry_form_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Form Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="enquiry_form_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Form Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="enquiry_button_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="enquiry_button_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibPrivacyPolicy" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Privacy Policy</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="privacy_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="privacy_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="privacy_detail_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Detail Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibTermsConditions" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Terms & Conditions</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="terms_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="terms_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="terms_detail_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Detail Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibTestimonial" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Testimonial</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="testi_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="testi_title_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="testi_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="testi_box_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Testimony Box Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="testi_text_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Text Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="testi_name_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Name Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibAppointment" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Appointment</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="appoint_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="appoint_title_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="appoint_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="appoint_form_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Form Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="appoint_form_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Form Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="appoint_button_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="appoint_button_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibFeedback" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Feedback</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="feedback_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="feedback_title_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="feedback_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="feedback_form_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Form Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="feedback_form_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Form Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="feedback_button_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="feedback_button_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibBrochure" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Brochure</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="brochure_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="brochure_title_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="brochure_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="brochure_box_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Brochure Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="brochure_name_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Name Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="brochure_button_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Background</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #1b55e2;" data-c="#1b55e2" data-n="brochure_button_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Button Color</h5>
                                <span class="color-code">#1b55e2</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibGallery" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Gallery</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="gallery_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="gallery_title_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="gallery_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                </div>
                
                <div class="row m-0">

                    <div id="colorLibPost" class="col-lg-12 mt-3">
                        <div class="seperator-header">
                            <h4 class="pl-3 pr-3 pt-1 pb-1">Post</h4>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #FFFFFF;" data-c="#FFFFFF" data-n="post_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Page Background</h5>
                                <span class="color-code">#FFFFFF</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="post_title_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="post_title_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Title Color</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #ff7a18;" data-c="#ff7a18" data-n="post_box_bg"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Post Box Background</h5>
                                <span class="color-code">#ff7a18</span>
                            </div>
                        </div>
                    </div> 

                    <div class="col-xl-4 col-lg-6 col-md-4 col-sm-6 col pb-3 color-wrap">
                        <div class="color-box">
                            <span class="cl-example colorCode" style="background-color: #000000;" data-c="#000000" data-n="post_text_color"></span>
                            <div class="cl-info">
                                <h5 class="cl-title mb-1">Post Text Color</h5>
                                <span class="color-code">#000000</span>
                            </div>
                        </div>
                    </div> 

                </div>

            </div>

            <div class="BKGc1 open ml-3 mr-3">
                <div class="gaTiT">
                    <button id="reset" class="btn btn-primary">Reset</button>
                    <button id="add" class="btn btn-primary ml-auto">Add Theme</button>
                </div>
            </div>

        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/theme.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    
</body>
</html>