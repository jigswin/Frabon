<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Orders Allocations</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
		
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="plugins/table/datatable/dt-global_style.css">
    
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="../css/account.css" rel="stylesheet" type="text/css">
    
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
                    <div class="page-title w-100 d-flex flex-wrap justify-content-end mb-0">
                        <h3 class="float-left w-100 mb-3">Orders Allocations
                            <?php if($_GET['sdate'] != '' && $_GET['sdate'] == $_GET['edate']) echo "( ".$_GET['sdate']." )"; ?>
                            <?php if($_GET['sdate'] != $_GET['edate']) echo "( ".$_GET['sdate']." to ".$_GET['edate']." )"; ?>
                        </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9 ml-auto mb-3">
                        <input type="text" hidden id="customer" value="all">
                    </div>
                    <div class="col-sm-3 ml-auto">
                        <div class="form-group">
                            <label for="date-p">Date</label>
                            <div class="date-picker-wrap">
                                <input id="date-p" class="form-control flatpickr flatpickr-input active mb-4 S5hPk" type="text" placeholder="Select Date.." value="<?php if($_GET['sdate']) echo $_GET['sdate']." to ".$_GET['edate'] ?>">
                            </div>
                            <div class="LMNEu OT150 d-none"></div>
                        </div>
                    </div>
                </div>
                <hr class="m-0">
                <div class="row status-wrap">
                    <div class="status-title mt-3">Order Status</div>
                    <button class="btn btn-primary mt-3 status" data-v="Pending">Pending</button>
                    <button class="btn btn-primary mt-3 status" data-v="Accepted">Accepted</button>
                    <button class="btn btn-primary mt-3 status" data-v="Declined">Declined</button>
                </div>
                <div class="row status-wrap justify-content-end">
                    <button class="btn btn-warning mt-2" id="reset">Reset</button>
                    <button class="btn btn-success mt-2" id="show">Show</button>
                </div>
                <hr class="m-2">
                <div class="VnBP5">
                    <div class="status-title">Update Multiple Order</div>
                    <div class="tgR5i">
                        <div class="CZiMO">
                            <label>Order Status</label>
                            <div class="E4K9B">
                                <div class="eiIfn aJQk9">Select Status</div>
                                <div class="vVyBe d-none">
                                    <div class="APd26 tmhbb" data-v="Pending">Pending</div>
                                    <div class="APd26 tmhbb" data-v="Accepted">Accepted</div>
                                    <div class="APd26 tmhbb" data-v="Declined">Declined</div>
                                </div>
                            </div>
                        </div>
                        <div class="CZiMO FHQiv d-none">
                            <label>Delivery Boy</label>
                            <div class="E4K9B">
                                <div class="eiIfn BeTkn">Select Delivery Boy</div>
                                <div class="vVyBe d-none">
                                <?php $query = mysqli_query($con, "SELECT * FROM `delivery_boy` ");
                                    while($row = mysqli_fetch_assoc($query)) {
                                        echo '<div class="APd26 q42mu" data-i="'.$row['id'].'" data-v="'.$row['name'].'">'.$row['name'].'</div>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success fLbNB" id="save">Update</button>
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
                                                <th>Date</th>
                                                <th>Order id</th>
                                                <th>Address</th>
                                                <th>Area</th>
                                                <th>Pincode</th>
                                                <th>Delivery Boy</th>
                                                <th>Payment Status</th>
                                                <th style="white-space: nowrap;">Order Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php

                                            $tmp = $_GET["status"];
                                            $status = array();
                                            if($tmp != '') {
                                                $status = explode("-", $tmp);
                                            }
                                            else {
                                                array_push($status, "Pending");
                                            }

                                            $i = 0;
                                            if($_GET['sdate'] && $_GET['edate']) {
                                                $_GET['sdate'] = str_replace('-', '/', $_GET['sdate']);
                                                $_GET['edate'] = str_replace('-', '/', $_GET['edate']);
                                                if($_GET['cust'] == "all" || !$_GET['cust']) {
                                                    $query = mysqli_query($con, "SELECT * FROM `order_list` WHERE date BETWEEN '{$_GET['sdate']}' AND '{$_GET['edate']}' ORDER BY date DESC, time DESC ");
                                                }
                                                else {
                                                    $query = mysqli_query($con, "SELECT * FROM `order_list` WHERE user_id = '{$_GET['cust']}' AND date BETWEEN '{$_GET['sdate']}' AND '{$_GET['edate']}' ORDER BY  date DESC, time DESC ");
                                                }
                                            }
                                            else {
                                                if($_GET['cust'] == "all" || !$_GET['cust']) {
                                                    $query = mysqli_query($con, "SELECT * FROM `order_list` ORDER BY date DESC, time DESC ");
                                                }
                                                else {
                                                    $query = mysqli_query($con, "SELECT * FROM `order_list` WHERE user_id = '{$_GET['cust']}' ORDER BY date DESC, time DESC ");
                                                }
                                            }
                                            while($orl = mysqli_fetch_assoc($query)){ 
                                                
                                                if(in_array($orl['status'], $status) || sizeof($status) == 0) {
                                                
                                                $i++;

                                                $query1 = mysqli_query($con, "SELECT * FROM `order-detail` WHERE order_id = '{$orl['order_id']}' ");
                                                $ord = mysqli_fetch_assoc($query1);

                                                $query2 = mysqli_query($con, "SELECT * FROM `product` WHERE id = '{$ord['prod_id']}' ");
                                                $prd = mysqli_fetch_assoc($query2);
                                                
                                                $query3 = mysqli_query($con, "SELECT * FROM `razor_pay` WHERE order_id = '{$orl['order_id']}' ");
                                                $rzp = mysqli_fetch_assoc($query3);

                                                $query4 = mysqli_query($con, "SELECT * FROM `delivery` as d, `delivery_boy` as db WHERE d.order_id = '{$orl['order_id']}' AND d.d_boy_id = db.id ");
                                                $dboy = mysqli_fetch_assoc($query4);
                                        ?>
                                            <tr class="OZ6VQ" data-id="<?php echo $orl['order_id'] ?>">
                                                <td></td>
                                                <td class="TGxlg"><?php echo $i ?></td>
                                                <td><?php echo $orl['date']." ".$orl['time'] ?></td>
                                                <td class="user-name nykTw"><?php echo $orl['order_id'] ?></td>
                                                <td class="long-text line-4"><?php echo $orl['address'] ?></td>
                                                <td><?php echo $orl['area'] ?></td>
                                                <td><?php echo $orl['pincode'] ?></td>
                                                <td class="d-boy"><?php echo $dboy['name'] ?></td>
                                                <td class='<?php 
                                                    if($orl['pay_status'] == "Success"){
                                                        echo "text-success";
                                                    }
                                                    else if($orl['pay_status'] == "Pending") {
                                                        echo "text-warning";
                                                    }
                                                    else if($orl['pay_status'] == "Fail") {
                                                        echo "text-danger";
                                                    }
                                                ?>'><?php echo $orl['pay_status'] ?></td>
                                                <td>
                                                    <select class="form-control order-status">
                                                        <option value="Pending" <?php if($orl['status'] == "Pending") echo "Selected" ?>>Pending</option>
                                                        <option value="Accepted" <?php if($orl['status'] == "Accepted") echo "Selected" ?>>Accepted</option>
                                                        <option value="Declined" <?php if($orl['status'] == "Declined") echo "Selected" ?>>Declined</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        <?php } } ?>
                                            
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

    <div class="lDCab">
        <div class="OWp1r">
            <div class="VVpEF">
                <div class="hfCXV"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div>
            </div>
            <div class="huyCD pt-0">
                <!-- Data -->
            </div>
        </div>
    </div>    
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/pages/order-list.js"></script>
    
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
                e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-outline-info m-auto">\n<input type="checkbox" class="new-control-input chk-parent sJ9Xw">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
            columnDefs:[ {
                targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                    return'<label class="new-control new-checkbox checkbox-outline-info  m-auto">\n<input type="checkbox" class="new-control-input child-chk JH5fJ">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
                }
            }],
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "lengthMenu": [50, 100, 200, 500, 1000],
            "pageLength": 50
        });

        multiCheck(c1);
    </script>

    <script src="plugins/flatpickr/flatpickr.js"></script>

    <script>
        var f1 = flatpickr(document.getElementById('date-p'), {
            mode: "range",
            dateFormat: "d-m-Y",
        });
    </script>
</body>

</html>