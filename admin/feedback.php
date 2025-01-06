<?php session_start(); error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php echo $_SESSION['user_type'] ?> - Feedback</title>
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
                    <div class="page-title w-100">
                        <h3 class="float-left">Feedback</h3>
                    </div>
                </div>

                <div class="row" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        
                            <div class="col-sm-3 date-filter-wrap">
                                <div class="form-group">
                                    <label for="date-p">Date</label>
                                    <div class="date-picker-wrap" style="margin-right: 15px;">
                                        <input id="date-p" class="form-control flatpickr flatpickr-input active mb-4 S5hPk" max="20-06-2021" type="text" placeholder="Select Date.." value="<?php if($_GET['created_date']) echo $_GET['sdate']." to ".$_GET['created_date'] ?>">
                                    </div>
                                    <div class="LMNEu OT150 d-none"></div>
                                </div>
                                <div class="row status-wrap justify-content-end"> 
                                    <button class="btn btn-success mt-2" id="show">Show</button>
                                    <button class="btn btn-warning mt-2" id="reset">Reset</button>
                                </div>
                            </div>
                            <div class="">
                                <div class="mb-4 style-1">
                                    <table id="style-1" class="table style-1 table-hover non-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Message</th>
                                                <th>Rating</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i = 0;
                                    if($_GET["sdate"] && $_GET["edate"]) {
                                        $sdate = explode('-', $_GET['sdate']);
                                        $edate = explode('-', $_GET['edate']);
                                        $sdate = $sdate[2]."-".$sdate[1]."-".$sdate[0]." 00:00:00";
                                        $edate = $edate[2]."-".$edate[1]."-".$edate[0]." 23:59:59";
                                        $query = mysqli_query($con, "SELECT * FROM `feedback` where date between '{$sdate}' and '{$edate}' ORDER BY date DESC ");
                                    }
                                    else {
                                        $query = mysqli_query($con, "SELECT * FROM `feedback` ORDER BY date DESC");
                                    }
                                    while($row = mysqli_fetch_assoc($query)){ $i++; ?>
                                        <tr class="OZ6VQ" data-id="<?php echo $row['id'] ?>">
                                                <td class="TGxlg"><?php echo $i ?></td>
                                                <td class="user-name"><?php echo $row['name'] ?></td>
                                                <td><?php echo $row['message'] ?></td>
                                                <td>
                                                    <?php $rating = $row['rating'];
                                                    for ($j = 1; $j <= $rating; $j++) { 
                                                        echo '<svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffbe3c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>';
                                                    } ?>
                                                </td>
                                                <!-- <td><?php echo getDateTime($row['date']) ?></td> -->
                                                <td><?php echo $row['date'] ?></td>
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
    <script src="assets/js/pages/video.js"></script>

    <script src="assets/js/pages/feedback.js"></script>

<script src="plugins/flatpickr/flatpickr.js"></script>

<script>
var f1 = flatpickr(document.getElementById('date-p'), {
    mode: "range",
    dateFormat: "d-m-Y",
    maxDate: "today"
});
</script>
    
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
            "lengthMenu": [10, 20, 50, 100],
            "pageLength": 10
        });

        multiCheck(c1);
    </script>


    <!-- END PAGE LEVEL SCRIPTS -->  
</body>

</html>