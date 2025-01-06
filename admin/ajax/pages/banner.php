<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'banner_add') {

        $query1 = mysqli_query($con, "SELECT max(position) FROM `banner`");
        $row = mysqli_fetch_assoc($query1);

        $position = $row['max(position)']+1;
        
        foreach ($_POST['array'] as $url) {
        
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/banner/' . $new_name;
            file_put_contents($path, file_get_contents($url));
            
            $query3 = mysqli_query($con, "INSERT INTO `banner` (`title`, `image`, `button`, `link`, `status`, `position`) 
                VALUES ('{$_POST['title']}', '{$new_name}', '{$_POST['button']}', '{$_POST['link']}', 1, $position) ");
            $id = mysqli_insert_id($con);
        
            insertLog($con, "banner" , $id, $new_name,'Banner add');
            
            $position++;
        }

        echo $query3 ? 1 : 2;
    }

    if($_POST['flag'] == 'banner_edit') {

        if($_POST['array'][0]){
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/banner/' . $new_name;
            file_put_contents($path, file_get_contents($_POST['array'][0]));

            $query = mysqli_query($con, "UPDATE `banner` SET `image` = '{$new_name}' WHERE banner_id = '{$_POST['banner_id']}' ");
        }

        $query = mysqli_query($con, "UPDATE `banner` SET `title` = '{$_POST['title']}', `button` = '{$_POST['button']}', `link` = '{$_POST['link']}' WHERE banner_id = '{$_POST['banner_id']}' ");
        if($query) {
            echo 1;
            insertLog($con, "banner" , $_POST['banner_id'], $new_name,'Banner update');
        }
        else {
            echo 2;
        }
    }
?>