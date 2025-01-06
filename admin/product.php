<?php session_start(); error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Product</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/custom_dt_custom.css">
    
    <!-- END PAGE LEVEL CUSTOM STYLES -->
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
                        <h3 class="float-left">Product</h3>
                        <a class="btn btn-primary float-right" href="product-add">Add Product</a>
                        <a class="btn btn-primary float-right" style="margin-right: 15px;" id="CpSNm" href="javascript:;">Change Position</a>
                        <button class="btn btn-primary float-right mr-2 mt-2 mt-sm-0" id="add-field-popup">Custom Fields</button>
                    </div>
                </div>

                <div class="row layout-spacing">
                    <div class="col-lg-12 hsl38">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <div class="mb-4 style-1">
                                    <table id="style-1" class="table style-1 table-hover non-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th>Size</th>
                                                <th>Stock</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            $i = 0;
                                            $query = mysqli_query($con, "SELECT * FROM `product` ORDER BY position ");
                                            while($row = mysqli_fetch_assoc($query)){ $i++;
                                        ?>
                                            <tr class="OZ6VQ" data-id="<?php echo $row['id'] ?>">
                                                <td></td>
                                                <td class="TGxlg"><?php echo $i ?></td>
                                                <td class="user-name"><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['cat_id'] ?></td>
                                                <td class="img-list-con">
                                                    <?php 
                                                        $qry = mysqli_query($con, "SELECT * FROM `product_image` WHERE pro_id = '{$row['id']}' ");
                                                        while($img = mysqli_fetch_assoc($qry)) { 
                                                    ?> 
                                                        <a href="images/product/<?php echo $img['image'] ?>" target="_blank"><img src="images/product/<?php echo $img['image'] ?>" width="70"></a>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row['price'] ?></td>
                                                <td class="text-ellipsis"><?php echo $row['description'] ?></td>
                                                <td><?php echo $row['size'] ?></td>
                                                <td><?php echo $row['stock'] ?></td>
                                                <td class="LctVL"><?php echo $row['status'] == 0 ? '<span class="badge outline-badge-danger shadow-none">Deactive</span>' : '<span class="badge outline-badge-info shadow-none">Active</span>' ?></td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><?php echo $row['status'] == 1 ? '<svg class="ZyUtL text-title" width="30" height="30" viewBox="0 0 24 24" data-v="1"><path fill="currentColor" d="M17,7H7A5,5 0 0,0 2,12A5,5 0 0,0 7,17H17A5,5 0 0,0 22,12A5,5 0 0,0 17,7M17,15A3,3 0 0,1 14,12A3,3 0 0,1 17,9A3,3 0 0,1 20,12A3,3 0 0,1 17,15Z" /></svg></li>' : '<svg class="ZyUtL text-title" width="30" height="30" viewBox="0 0 24 24" data-v="0"><path fill="currentColor" d="M7,10A2,2 0 0,1 9,12A2,2 0 0,1 7,14A2,2 0 0,1 5,12A2,2 0 0,1 7,10M17,7A5,5 0 0,1 22,12A5,5 0 0,1 17,17H7A5,5 0 0,1 2,12A5,5 0 0,1 7,7H17M7,9A3,3 0 0,0 4,12A3,3 0 0,0 7,15H17A3,3 0 0,0 20,12A3,3 0 0,0 17,9H7Z" /></svg>' ?></li>
                                                        <li><a href="product-edit?id=<?php echo $row['id'] ?>" data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                        <li><a href="javascript:void(0);" class="delete-row" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                            
                                        </tbody>
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
    <script src="assets/js/pages/product.js"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="assets/js/custom.js"></script>
    <script src="plugins/blockui/jquery.blockUI.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="plugins/table/datatable/datatables.js"></script>
    
    <script>
        // var e;
        c1 = $('#style-1').DataTable({
            headerCallback:function(e, a, t, n, s) {
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent T8TgF">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk rX8CP">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [10, 20, 50, 100],
            "pageLength": 10
        });

        multiCheck(c1);
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->  

    
</body>

</html>