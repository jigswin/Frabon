<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'customer_add') {

        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

        $query = mysqli_query($con, "INSERT INTO `customer` (`type`, `name`, `email`, `mobile`, `password`, `pro_pic`, `gender`, `city`) 
            VALUES ('Default', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['mobile']}', '{$pass}', 'profile.jpg', '', '') ");
        $id = mysqli_insert_id($con);

        if($query) {
            echo 1;
            insertLog($con, "customer" , $id, '','Customer add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'customer_edit') {

        $query = mysqli_query($con, "UPDATE `customer` SET `name` = '{$_POST['name']}', `email` = '{$_POST['email']}', 
        `mobile` = '{$_POST['mobile']}' WHERE user_id = '{$_POST['cust_id']}' ");
        
        if($query) {
            echo 1;
            insertLog($con, "customer" , $_POST['cust_id'], '','Customer update');
        }
        else {
            echo 2;
        }
    }

?>