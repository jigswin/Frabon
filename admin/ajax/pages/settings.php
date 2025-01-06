<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'updateProfile') {

        $query = mysqli_query($con, "UPDATE `admin` SET 
            `name` = '{$_POST['name']}'
            WHERE `user_id` = '{$_SESSION['user_id']}' ");
        
        if($query) {

            $_SESSION['user_name'] = $_POST['name'];

            if($_SESSION['user_type'] == "User") {
                echo 1;
                insertLog($con, "profile" , $_SESSION['user_id'], '','profile update');
            }
        }
        else {
            echo 2;
        }

        if($_SESSION['user_type'] == "Admin") {

            $qry = '';
            
            if ($_POST['logo']) {
            
                $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
                $path = '../../images/logo/' . $new_name;
                
                file_put_contents($path, file_get_contents($_POST['logo']));       
                $query = mysqli_query($con, "UPDATE `detail` SET `logo` = '{$new_name}' ");     
            }

            if($_POST['bannerImg']) {
                $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
                $path = '../../images/contact/' . $new_name;
                
                file_put_contents($path, file_get_contents($_POST['bannerImg']));
                $query = mysqli_query($con, "UPDATE `detail` SET `banner` = '{$new_name}' ");
            }
            
            foreach ($_POST['array'][0] as $key => $n) {
                
                if($key == 0) {
                    $qry .= "`" . $n . "` = '" . $_POST['array'][1][$key] . "'";
                }
                else {
                    $qry .= ", `" . $n . "` = '" . $_POST['array'][1][$key] . "'";
                }
            }
            
            $query = mysqli_query($con, "UPDATE `detail` SET $qry ");
        
            if($query) {
                echo 1;
                insertLog($con, "profile" , $_SESSION['user_id'], '','profile update');
            }
            else {
                echo 2;
            }
        }
    }
?>