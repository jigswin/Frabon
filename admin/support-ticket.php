<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Ticket</title>
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
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
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
                            
                            <div class="row layout-top-spacing">

                                <div class="col-xl-11 col-lg-11 col-md-11 layout-spacing mx-auto">

                                    <?php 
                                        $sup_qry = mysqli_query($sup_con, "SELECT * FROM `detail` ");
                                        $sup_detail = mysqli_fetch_assoc($sup_qry);
                                    
                                        $query1 = mysqli_query($sup_con, "SELECT * FROM `support` WHERE ticket = '{$_GET['id']}' ");
                                        if(mysqli_num_rows($query1) == 0)
                                        {
                                            echo '<div class="alert alert-danger mx-5" role="alert">
                                                    <h4 class="alert-heading">Error!</h4>
                                                    <p>Ticket not found!</p>
                                                </div>';
                                        }
                                        else
                                        {
                                            $row1 = mysqli_fetch_assoc($query1);
                                    ?>

                                    <div class="d-sm-flex my-3">
                                        <h4>Status : 
                                            <?php if($row1['status'] == 0) echo '<span class="text-danger">Pending</span>';
                                                else if($row1['status'] == 1) echo  '<span class="text-info">Working</span>';
                                                else echo '<span class="text-success">Resolved</span>';
                                            ?>
                                        </h4>
                                        <button id="open-reply-form" class="btn btn-dark d-block ml-auto px-5">Reply</button>
                                    </div>

                                    <div class="reply-form mb-5 d-none">
                                        <form id="general-info" method="post" class="section general-info">
                                            <div class="info pt-3">
                                                <h3 class="mb-3">Reply</h3>
                                                <div class="row">
                                                    <div class="col-lg-11 mx-auto">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-lg-12 col-md-12">
                                                                <div class="row">

                                                                    <div class="col-sm-12 mb-4">
                                                                        <label>Message</label>
                                                                        <div class="widget-content widget-content-area p-0">
                                                                            <div id="editor-container"></div>
                                                                            <div class="tmp-code d-none"></div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="widget-content widget-content-area p-1">
                                                                            <div class="custom-file-container" data-upload-id="image">
                                                                                <label>Upload Image (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                                <label class="custom-file-container__custom-file" >
                                                                                    <input type="file" class="custom-file-container__custom-file__custom-file-input" multiple accept="image/x-png,image/gif,image/jpeg">
                                                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                                </label>
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
                                        </form>
                                        <div class="text-right mt-3">
                                            <button id="send-reply" class="btn btn-dark ml-auto">Send Reply</button>
                                            <button id="cancel" class="btn btn-dark ml-auto">Cancel</button>
                                        </div>
                                    </div>

                                    <div class="chat-container">

                                    <?php $query = mysqli_query($sup_con, "SELECT * FROM `support_chat` WHERE ticket_id = '{$_GET['id']}' ORDER BY id DESC");
                                    while($row = mysqli_fetch_assoc($query)) {
                                        if($row['is_client'] == 0) {
                                            $img_path = $sup_detail['img_url'];
                                        } else {
                                            $img_path = './images/support/';
                                        }

                                        ?>
                                        
                                        <div class="chat-item">
                                            <div class="chat-header">
                                                <div class="chat-header-left">
                                                    <h5 class="my-0">
                                                        <?php echo $row['user_name'];
                                                            echo !$row['is_client'] ? ' (Support Team)' : '';
                                                        ?>
                                                    </h5>
                                                </div>
                                                <div class="chat-header-right">
                                                    <h6 class="my-0"><?php echo $row['datetime'] ?></h6>
                                                </div>
                                            </div>
                                            <div class="chat-body">
                                                <?php echo $row['message'] ?>
                                            </div>
                                            <div class="chat-attachment">
                                                <div class="chat-attachment-title">
                                                    <h6>Attachments</h6>
                                                </div>
                                                <div class="chat-attachment-list d-none">
                                                    <?php $images = explode(",", $row['image']);
                                                    if($images[0]) {
                                                        foreach ($images as $val) { ?>
                                                            <div class="chat-attachment-file">
                                                                <h6 class="mb-1"><a href="<?php echo $img_path.$val ?>" target="blank"><?php echo $val ?></a></h6>
                                                            </div>
                                                        <?php } }
                                                        else {
                                                            echo '<div class="chat-attachment-zero">
                                                                <p class="text-center mb-0">No Attachment</p>
                                                            </div>';
                                                        } ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                        <div class="chat-item">
                                            <div class="chat-header">
                                                <div class="chat-header-left">
                                                    <h5 class="my-0">
                                                        <?php echo $row1['user_name'] ?>
                                                    </h5>
                                                </div>
                                                <div class="chat-header-right">
                                                    <h6 class="my-0"><?php echo $row1['created_date'] ?></h6>
                                                </div>
                                            </div>
                                            <div class="chat-body">
                                                <?php echo $row1['problem'] ?>
                                            </div>
                                            <div class="chat-attachment">
                                                <div class="chat-attachment-title">
                                                    <h6>Attachments</h6>
                                                </div>
                                                <div class="chat-attachment-list d-none">
                                                    <?php $images = explode(",", $row1['image']);
                                                    if($images[0]) {
                                                        foreach ($images as $val) { ?>
                                                            <div class="chat-attachment-file">
                                                                <h6 class="mb-1"><a href="images/support/<?php echo $val ?>" target="blank"><?php echo $val ?></a></h6>
                                                            </div>
                                                        <?php } }
                                                        else {
                                                            echo '<div class="chat-attachment-zero">
                                                                <p class="text-center mb-0">No Attachment</p>
                                                            </div>';
                                                        } ?>
                                                </div>
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
    <script src="assets/js/pages/support.js"></script>
    
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
    
    <script src="plugins/editors/quill/quill.js"></script>
    <script src="plugins/editors/quill/custom-quill.js"></script>
</body>
</html>