<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'delivery_boy_add') {

        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    
        if(sizeof($_POST["array"]) > 0) {
            foreach ($_POST['array'] as $url) {
                
                $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
                $path = '../../images/profile/' . $new_name;
                
                file_put_contents($path, file_get_contents($url));
            }
        }
        else {
            $new_name = "profile.jpg";
        }

        $count = 0;
        foreach ($_POST['area'] as $value) {
            
            if($count == 0) {
                $area .= $value;
                $count++;
            }
            else {
                $area .= ',' . $value;
            }
        }

        $query = mysqli_query($con, "INSERT INTO `delivery_boy` (`name`, `email`, `mobile`, `password`, `profile_pic`, `address`, `licence_no`, `vehicle_no`, `area`, `status`) 
            VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$_POST['mobile']}', '{$pass}', '{$new_name}', '{$_POST['address']}', '{$_POST['licence']}', '{$_POST['vehicle']}', '{$area}', 1) ");
        $id = mysqli_insert_id($con);

        if($query) {
            echo 1;
            insertLog($con, "delivery boy" , $id, '','Delivery boy add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'delivery_boy_edit') {

        if(sizeof($_POST["array"]) > 0) {
            foreach ($_POST['array'] as $url) {
                
                $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
                $path = '../../images/profile/' . $new_name;
                
                file_put_contents($path, file_get_contents($url));
                $query = mysqli_query($con, "UPDATE `delivery_boy` SET `profile_pic` = '{$new_name}' WHERE id = '{$_POST['id']}' ");
            }
        }

        $count = 0;
        foreach ($_POST['area'] as $value) {
            
            if($count == 0) {
                $area .= $value;
                $count++;
            }
            else {
                $area .= ',' . $value;
            }
        }

        $query = mysqli_query($con, "UPDATE `delivery_boy` SET 
        `name` = '{$_POST['name']}', 
        `email` = '{$_POST['email']}', 
        `mobile` = '{$_POST['mobile']}', 
        `address` = '{$_POST['address']}', 
        `licence_no` = '{$_POST['licence']}', 
        `vehicle_no` = '{$_POST['vehicle']}', 
        `area` = '{$area}'
        WHERE id = '{$_POST['id']}' ");
        
        if($query) {
            echo 1;
            insertLog($con, "delivery boy" , $_POST['id'], '','Delivery Boy update');
        }
        else {
            echo 2;
        }
    }

?>