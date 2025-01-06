<div class="sidebar-wrapper sidebar-theme">
            
    <nav id="sidebar">

        <ul class="list-unstyled menu-categories" id="accordionExample">
            
            <li class="menu<?php echo $url == "index" ? " active" : "" ?> submenu">
                <a href="./" aria-expanded="<?php echo $url == "index" ? "true" : "false" ?>" class="dropdown-toggle">
                    <div class="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> -->
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <!-- <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>REPORTS</span></div>
            </li> -->

            <?php $query = mysqli_query($con, "SELECT * FROM menu WHERE block = 1 ");
                while($row = mysqli_fetch_assoc($query)) { ?>

                <?php if (in_array($row['value'], $userAccess) || $_SESSION['user_type'] == 'Admin') { ?>
                <li class="menu<?php echo $url == $row['value'] ? " active" : "" ?>">
                    <a href="<?php echo $row['value'] ?>" aria-expanded="<?php echo $url == $row['value'] ? "true" : "false" ?>" class="dropdown-toggle">
                        <div class="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg> -->
                        <span><?php echo ucwords($row['name']) ?></span>
                        </div>
                    </a>
                </li>
                <?php } ?>
            <?php } ?>


            <?php if($url == 'export') { ?>
            <li class="menu<?php echo $url == "export" ? " active" : "" ?>">
                <a href="<?php echo "export?e=".$_GET['e'] ?>" aria-expanded="<?php echo $url == "export" ? "true" : "false" ?>" class="dropdown-toggle">
                    <div class="">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg> -->
                    <span>Export</span>
                    </div>
                </a>
            </li>
            <?php } ?>


            <!-- <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>USER INTERFACE</span></div>
            </li>                     -->

            <?php $query = mysqli_query($con, "SELECT * FROM menu WHERE block = 2 ");
                while($row = mysqli_fetch_assoc($query)) { ?>

                <?php if (in_array($row['value'], $userAccess) || $_SESSION['user_type'] == 'Admin') { ?>
                <li class="menu<?php echo $url == $row['value'] ? " active" : "" ?>">
                    <a href="<?php echo $row['value'] ?>" aria-expanded="<?php echo $url == $row['value'] ? "true" : "false" ?>" class="dropdown-toggle">
                        <div class="">
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle></svg> -->
                        <span><?php echo ucwords($row['name']) ?></span>
                        </div>
                    </a>
                </li>
                <?php } ?>
            <?php } ?>

            <!--<li class="menu<?php echo $url == "profile" ? " active" : "" ?>">-->
            <!--    <a href="profile" aria-expanded="true" class="dropdown-toggle">-->
            <!--        <div class="">-->
            <!--        <span>Profile</span>-->
            <!--        </div>-->
            <!--    </a>-->
            <!--</li>-->

            <!--<li class="menu<?php echo $url == "settings" ? " active" : "" ?>">-->
            <!--    <a href="settings" aria-expanded="true" class="dropdown-toggle">-->
            <!--        <div class="">-->
            <!--        <span>Settings</span>-->
            <!--        </div>-->
            <!--    </a>-->
            <!--</li>-->

            
            <!-- <?php if($url == 'detail-job' || $url == 'edit-job' || $url == 'post-job') { ?>
            <li class="menu<?php echo $url == "detail-job" ? " active" : "" ?>">
                <a href="<?php echo "detail-job?e=".$_GET['e'] ?>" aria-expanded="<?php echo $url == "detail-job" ? "true" : "false" ?>" class="dropdown-toggle">
                    <div class="">
                    <span>Detail Job</span>
                    </div>
                </a>
            </li>
            <?php } ?> -->
<!-- 
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span>USER AND PAGES</span></div>
            </li> -->
                
           
           
        </ul>
        
    </nav>

</div>
