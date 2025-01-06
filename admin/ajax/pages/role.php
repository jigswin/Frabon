<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'role_add') {

        $count = 0;
        foreach ($_POST['menu'] as $value) {
            
            if($count == 0) {
                $menu .= $value;
                $count++;
            }
            else {
                $menu .= ',' . $value;
            }
        }
        
        $query = mysqli_query($con, "INSERT INTO `role` (`name`, `access_menu`) 
            VALUES ('{$_POST['name']}', '{$menu}') ");
        $id = mysqli_insert_id($con);
        
        if($query) {
            echo 1;
            insertLog($con, "role" , $id, '','Role add'); 
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'role_edit') {

        $count = 0;
        foreach ($_POST['menu'] as $value) {
            
            if($count == 0) {
                $menu .= $value;
                $count++;
            }
            else {
                $menu .= ',' . $value;
            }
        }

        $query = mysqli_query($con, "UPDATE `role` SET `name` = '{$_POST['name']}', `access_menu` = '{$menu}' 
            WHERE role_id = '{$_POST['role_id']}' ");
        
        if($query) {
            echo 1;
            insertLog($con, "role" , $_POST['role_id'], '','Role update'); 
        }
        else {
            echo 2;
        }
    }

?>