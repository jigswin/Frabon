<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'user_add') {

        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        $enddate = date('Y-m-d', strtotime('+1 year'));

        $query = mysqli_query($con, "INSERT INTO `admin` (`role`, `name`, `email`, `mobile`, `password`, `end_date`, `status`) 
            VALUES ('{$_POST['role']}', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['mobile']}', '{$pass}', '{$enddate}', 1) ");
        $id = mysqli_insert_id($con);

        if($query) {
            echo 1;
            insertLog($con, "user" , $id, '','User add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'user_edit') {

        $query = mysqli_query($con, "UPDATE `admin` SET `role` = '{$_POST['role']}', `name` = '{$_POST['name']}', 
            `email` = '{$_POST['email']}', `mobile` = '{$_POST['mobile']}' WHERE user_id = '{$_POST['user_id']}' ");
        
        if($query) {
            echo 1;
            insertLog($con, "user" , $_POST['user_id'], '','User update');
        }
        else {
            echo 2;
        }
    }

?>