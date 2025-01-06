<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'delivery_area_add') {

        $area = lcfirst($_POST['name']);

        $query = mysqli_query($con, "INSERT INTO `delivery_area` (`name`, `pincode`, `status`) 
            VALUES ('{$area}', '{$_POST['pincode']}', '{$_POST['status']}') ");
        $id = mysqli_insert_id($con);

        if($query) {
            echo 1;
            insertLog($con, "delivery area" , $id, '','Delivery area add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'delivery_area_edit') {
        
        $area = lcfirst($_POST['name']);

        $query = mysqli_query($con, "UPDATE `delivery_area` SET `name` = '{$area}', `pincode` = '{$_POST['pincode']}', 
            `status` = '{$_POST['status']}' WHERE id = '{$_POST['id']}' ");
        
        if($query) {
            echo 1;
            insertLog($con, "delivery area" , $_POST['id'], '','Delivery area update');
        }
        else {
            echo 2;
        }
    }

?>