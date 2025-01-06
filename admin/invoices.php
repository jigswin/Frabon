<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Invoices</title>
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
    
    <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
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
                    <div class="page-title w-100 d-flex flex-wrap justify-content-end">
                        <h3 class="float-left w-100">Invoices
                            <?php if($_GET['sdate'] != '' && $_GET['sdate'] == $_GET['edate']) echo "( ".$_GET['sdate']." )"; ?>
                            <?php if($_GET['sdate'] != $_GET['edate']) echo "( ".$_GET['sdate']." to ".$_GET['edate']." )"; ?>
                        </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9 ml-auto mb-3">
                        <input type="text" hidden id="customer" value="all">
                        <div class="btn btn-primary float-left" id="download-all-invoice">Download All</div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="date-p">Date</label>
                            <div class="date-picker-wrap">
                                <input id="date-p" class="form-control flatpickr flatpickr-input active mb-4 S5hPk" max="20-06-2021" type="text" placeholder="Select Date.." value="<?php if($_GET['sdate']) echo $_GET['sdate']." to ".$_GET['edate'] ?>">
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
                    <button class="btn btn-primary mt-3 status" data-v="Dispatched">Dispatched</button>
                    <button class="btn btn-primary mt-3 status" data-v="Delivered">Delivered</button>
                    <button class="btn btn-primary mt-3 status" data-v="Cancelled">Cancelled</button>
                    <button class="btn btn-primary mt-3 status" data-v="Failed">Failed</button>
                </div>
                <div class="row status-wrap justify-content-end">
                    <button class="btn btn-warning mt-2" id="reset">Reset</button>
                    <button class="btn btn-success mt-2" id="show">Show</button>
                </div>

                <div class="row layout-spacing">
                    <div class="col-lg-12 hsl38">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <div class="mb-4 style-1">
                                    <table id="style-1" class="table style-1 table-hover non-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Id</th>
                                                <th>Order Status</th>
                                                <th>payment Status</th>
                                                <th>Date</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                            $tmp = $_GET["status"];
                                            if($tmp != '') {
                                                $status = explode("-", $tmp);
                                            }

                                            $i = 0;
                                            if($_GET['sdate'] && $_GET['edate']) {
                                                $_GET['sdate'] = str_replace('-', '/', $_GET['sdate']);
                                                $_GET['edate'] = str_replace('-', '/', $_GET['edate']);
                                                $query = mysqli_query($con, "SELECT * FROM `order_list` WHERE date BETWEEN '{$_GET['sdate']}' AND '{$_GET['edate']}' ORDER BY date DESC, time DESC ");
                                            }
                                            else {
                                                $query = mysqli_query($con, "SELECT * FROM `order_list` ORDER BY date DESC, time DESC ");
                                            }
                                            while($row = mysqli_fetch_assoc($query)){ 

                                                if(in_array($roe['status'], $status) || sizeof($status) == 0) {
                                                $i++;
                                        ?>
                                            <tr class="OZ6VQ" data-id="<?php echo $row['order_id'] ?>">
                                                <td class="TGxlg"><?php echo $i ?></td>
                                                <td class="user-name nykTw"><?php echo $row['order_id'] ?></td>
                                                <td class='<?php 
                                                    if($row['status'] == "Delivered"){
                                                        echo "text-success";
                                                    }
                                                    else if($row['status'] == "Pending") {
                                                        echo "text-warning";
                                                    }
                                                    else if($row['status'] == "Cancelled") {
                                                        echo "text-danger";
                                                    }
                                                ?>'><?php echo $row['status'] ?></td>
                                                <td class='<?php 
                                                    if($row['pay_status'] == "Success"){
                                                        echo "text-success";
                                                    }
                                                    else if($row['pay_status'] == "Pending") {
                                                        echo "text-warning";
                                                    }
                                                    else if($row['pay_status'] == "Fail") {
                                                        echo "text-danger";
                                                    }
                                                ?>'><?php echo $row['pay_status'] ?></td>
                                                <td><?php echo $row['date']." ".$row['time'] ?></td>
                                                <td><a class="btn btn-primary mr-2 mb-2 invoice" style="width: 160px;" href="../invoice/Invoice-<?php echo $row['order_id'] ?>.pdf" download="invoice-<?php echo $row['order_id'] ?>.pdf">Download</a></td>
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
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.1/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.1.0/jszip-utils.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>

    <script src="assets/js/pages/invoices.js"></script>
    
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
    <!-- END PAGE LEVEL SCRIPTS -->  
    <script src="plugins/flatpickr/flatpickr.js"></script>

    <script>
        var f1 = flatpickr(document.getElementById('date-p'), {
            mode: "range",
            dateFormat: "d-m-Y",
        });
    </script>
    
</body>

</html>