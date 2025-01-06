<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'main_category_add') {

        $area = lcfirst($_POST['name']);

        $query = mysqli_query($con, "INSERT INTO `main_category` (`name`, `status`) 
            VALUES ('{$area}', '{$_POST['status']}') ");
        $id = mysqli_insert_id($con);

        if($query) {
            echo 1;
            insertLog($con, "main category" , $id, '','Main category add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'main_category_edit') {
        
        $area = lcfirst($_POST['name']);

        $query = mysqli_query($con, "UPDATE `main_category` SET `name` = '{$area}', `status` = '{$_POST['status']}' WHERE id = '{$_POST['id']}' ");
        
        if($query) {
            echo 1;
            insertLog($con, "main category" , $_POST['id'], '','Main category update');
        }
        else {
            echo 2;
        }
    }

?>