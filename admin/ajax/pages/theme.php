<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'add_theme') {

        $qry1 = ''; $qry2 = '';
        
        foreach ($_POST['name'] as $key => $n) {
            
            if($key == 0) {
                $qry1 .= "`" . $n . "`";
                $qry2 .= "'" . $_POST['color'][$key] . "'";
            }
            else {
                $qry1 .= ", `" . $n . "`";
                $qry2 .= ", '" . $_POST['color'][$key] . "'";
            }
        }
        
        $query = mysqli_query($con, "INSERT INTO `theme` (`name`, $qry1, `status`) VALUES ('{$_POST['tname']}', $qry2, 0) ");
    
        if($query) { echo 1; }
        else { echo 2; }
        
    }

    if($_POST['flag'] == 'save_theme') {

        $qry = '';
        
        foreach ($_POST['name'] as $key => $n) {
            
            if($key == 0) {
                $qry .= "`" . $n . "` = '" . $_POST['color'][$key] . "'";
            }
            else {
                $qry .= ", `" . $n . "` = '" . $_POST['color'][$key] . "'";
            }
        }
        
        $query = mysqli_query($con, "UPDATE `theme` SET $qry WHERE theme_id = '{$_POST['id']}' ");
    
        if($query) { echo 1; }
        else { echo 2; }
    }

    if($_POST['flag'] == 'change_status') {

        if($_POST['status'] == 1) {
            $_POST['id'] = $_POST['id'] == 0 ? 1 : $_POST['id'];
            $query = mysqli_query($con, "UPDATE `theme` SET `status` = 0 ");
            $query1 = mysqli_query($con, "UPDATE `theme` SET `status` = '{$_POST['status']}' WHERE `theme_id` = '{$_POST['id']}' ");
        
            if($query1) {
                echo 1;
            }
            else {
                echo 2;
            }
        }
        else {
            $query = mysqli_query($con, "UPDATE `theme` SET `status` = 0 ");
            $query1 = mysqli_query($con, "UPDATE `theme` SET `status` = 1 WHERE `theme_id` = 1 ");
        
            if($query1) {
                echo 1;
            }
            else {
                echo 2;
            }
        }
        
    }
    
?>