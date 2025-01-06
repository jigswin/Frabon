<?php 
    include "../config/config.php";  
    if( $_SESSION['user_id'] == '' || $_SESSION['user_name'] == '' || $_SESSION['user_type'] == '' ) {
        echo "<script>location.href='login'</script>";
    }
?>


<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

          <ul class="navbar-nav theme-brand flex-row text-center adminName" style="margin:auto">
            <li class="nav-item theme-text">
                <a href="./" class="nav-link" style="color: var(--h-icon)"> <?php echo TITLE ?> </a>
            </li>
        </ul>
        
        <p class="ml-3" style="font-size: 20px; display: flex; margin-bottom: 0;" id="dis"><span>00</span>:<span>00</span>:<span>00</span></p>
        
            <a class="btn btn-primary float-right support mx-3 d-flex align-center focusSupport"  href="support">   
            <svg style="width:24px;height:24px; margin-right:5px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M18.72,14.76C19.07,13.91 19.26,13 19.26,12C19.26,11.28 19.15,10.59 18.96,9.95C18.31,10.1 17.63,10.18 16.92,10.18C13.86,10.18 11.15,8.67 9.5,6.34C8.61,8.5 6.91,10.26 4.77,11.22C4.73,11.47 4.73,11.74 4.73,12A7.27,7.27 0 0,0 12,19.27C13.05,19.27 14.06,19.04 14.97,18.63C15.54,19.72 15.8,20.26 15.78,20.26C14.14,20.81 12.87,21.08 12,21.08C9.58,21.08 7.27,20.13 5.57,18.42C4.53,17.38 3.76,16.11 3.33,14.73H2V10.18H3.09C3.93,6.04 7.6,2.92 12,2.92C14.4,2.92 16.71,3.87 18.42,5.58C19.69,6.84 20.54,8.45 20.89,10.18H22V14.67H22V14.69L22,14.73H21.94L18.38,18L13.08,17.4V15.73H17.91L18.72,14.76M9.27,11.77C9.57,11.77 9.86,11.89 10.07,12.11C10.28,12.32 10.4,12.61 10.4,12.91C10.4,13.21 10.28,13.5 10.07,13.71C9.86,13.92 9.57,14.04 9.27,14.04C8.64,14.04 8.13,13.54 8.13,12.91C8.13,12.28 8.64,11.77 9.27,11.77M14.72,11.77C15.35,11.77 15.85,12.28 15.85,12.91C15.85,13.54 15.35,14.04 14.72,14.04C14.09,14.04 13.58,13.54 13.58,12.91A1.14,1.14 0 0,1 14.72,11.77Z" />
                </svg>
                Support
            </a>
         
        <ul class="navbar-item flex-row scr">

            <li class="nav-item align-self-center search-animated GEm8N"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <form class="form-inline search-full form-inline search" role="search">
                    <div class="search-bar">
                        <input type="text" class="form-control search-form-control ml-lg-auto Jg8As" placeholder="Search...">
                        <div class="M8MLc d-none"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></div>
                        <div class="OcVRK d-none">
                            <a href="./"><div class="UXZ01">Home</div></a>
                            <?php
                            if($_SESSION['user_type'] == 'Admin') {
                                $query = mysqli_query($con, "SELECT * FROM menu ");
                                while($row = mysqli_fetch_assoc($query)) {
                                    echo '<a href="'.$row['value'].'"><div class="UXZ01">'.$row['name'].'</div></a>';
                                }
                            }
                            else {
                                $query = mysqli_query($con, "SELECT * FROM role WHERE role_id = '{$_SESSION['role']}' ");
                                $row = mysqli_fetch_assoc($query);
                                $list = explode(",", $row['access_menu']);

                                foreach ($list as $val) {
                                    $query = mysqli_query($con, "SELECT * FROM menu WHERE value = '{$val}' ");
                                    $row = mysqli_fetch_assoc($query);
                                    echo '<a href="'.$row['value'].'"><div class="UXZ01">'.$row['name'].'</div></a>';
                                }
                            }
                            
                            ?>
                            <a href="profile"><div class="UXZ01">Profile</div></a>
                            <a href="settings"><div class="UXZ01">Settings</div></a>
                            <a href="support"><div class="UXZ01">Support</div></a>

                        </div>
                    </div>
                </form>
            </li>

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                </a>
                <div class="dropdown-menu position-absolute e-animated e-fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">                            
                        <div class="media mx-auto">
                            <?php 
                            if($_SESSION['picture'] != '') {
                                echo '<div class="box"><img src="'.$_SESSION['picture'].'" class="img-fluid" alt="Picture"></div>';
                            }
                            else {
                                echo '<div class="l7FS6">'.$_SESSION['user_name'][0].'</div>';
                            } ?>
                            <div class="media-body">
                                <h5><?php echo $_SESSION['user_name'] ?></h5>
                                <p><?php echo $_SESSION['user_type'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="profile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>My Profile</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="settings">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> <span>Settings</span>
                        </a>
                    </div>
                    <div class="dropdown-item switchMode">
                        <a href="javascript:;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg> <span id="clm">Dark Mode</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="logout">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </header>

</div>


<div class="Mykq7 d-none"></div>
<div class="GmWow main-loader">
    <!-- <div class="qALeD">
        <div class="yXeRi"></div>
        <div class="yXeRi"></div>
        <div class="yXeRi"></div>
        <div class="UAuKb"></div>
        <div class="UAuKb"></div>
        <div class="UAuKb"></div>
    </div> -->
</div>

<?php

    $query = mysqli_query($con, "SELECT * FROM admin WHERE user_id = '".$_SESSION['user_id']."' ");
    $user_data = mysqli_fetch_assoc($query);
    
    $url = explode("-", pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME));
    $fullUrl = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
    
    if($fullUrl == "support-add"|| 
    $fullUrl == "support-ticket"|| 
       $fullUrl == "theme-add" ||
       $fullUrl == "theme-edit" ||
       $fullUrl == "payment-add" ||
       $fullUrl == "contact_us-add" ||
       $fullUrl == "contact_us-edit"){
       $url = "pages";
    }

    else if($fullUrl == "role-add"){
       $url = "user";
    }

    else if($url[1] == "add" || $url[1] == "edit") {
        $url = $url[0];
    }
    else if($fullUrl == "detail-job" || 
        $fullUrl == "edit-job" ||
        $fullUrl == "post-job") {
        $url = "careers";
    }
    else if($fullUrl == "support" ||
        $fullUrl == "terms-conditions" ||
        $fullUrl == "privacy-policy" ||
        $fullUrl == "payment"||
        $fullUrl == "theme" ||
        $fullUrl == "profile"||
        $fullUrl == "settings"||
        $fullUrl == "licence" ||
        $fullUrl == "userlog" ||
        $fullUrl == "contact_us" ||
        $fullUrl == "log" ) {
        $url = "pages";
    }
    else if($fullUrl == "main-category" || 
    $fullUrl == "main-category-add" ||
    $fullUrl == "main-category-edit" ||

    $fullUrl == "subcategory" ||
    $fullUrl == "subcategory-edit" ||
    $fullUrl == "subcategory-add" ||

    $fullUrl == "change-price" ||
    $fullUrl == "stock" ||
    $fullUrl == "customer" ||
    $fullUrl == "customer-add" ||
    $fullUrl == "customer-edit"||

    $fullUrl == "delivery-boy" ||
    $fullUrl == "delivery-boy-add" ||
    $fullUrl == "delivery-boy-edit"||

    $fullUrl == "delivery-area" ||
    $fullUrl == "delivery-area-edit" ||
    $fullUrl == "delivery-area-add" ||

    $fullUrl == "order-list" ||
    $fullUrl == "order-allocation" || 
    $fullUrl == "delivery" || 
    $fullUrl == "invoices" ) {
    $url = "e-store";
}
    else if($fullUrl == "enquiry" ||
        $fullUrl == "contact" ||
        $fullUrl == "appointment"||
        $fullUrl == "feedback"||
        $fullUrl == "subscriber") {
        $url = "enq";
    }
    else if($fullUrl == "role") {
        $url = "user";
    }
    else {
        $url = $fullUrl;
    }


    $userAccess = array();
    
    if($_SESSION['user_type'] != 'Admin') {
        
        $query = mysqli_query($con, "SELECT * FROM role WHERE role_id = '{$user_data['role']}' ");
        $row = mysqli_fetch_assoc($query);

        $userAccess = explode(",", $row['access_menu']);    

        if($url != "index" && $url != "profile" && $url != "settings" && $url != "support" && $url != "export" && 
                !in_array($url, $userAccess) ) {
            
            echo "<script> window.history.back(); </script>";
        }
    }

?>
