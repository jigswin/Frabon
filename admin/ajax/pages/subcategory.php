<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'subcategory_add') {

        $img = ''; $banner = '';

        foreach ($_POST['array1'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/sub category/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));
            $img = $new_name;
        }

        foreach ($_POST['array2'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/sub category/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));
            $banner = $new_name;
        }

        $query = mysqli_query($con, "INSERT INTO `sub_category` (`cat_id`, `name`, `image`, `banner`, `status`) 
            VALUES ('{$_POST['cat_id']}', '{$_POST['name']}', '{$img}', '{$banner}', 1) ");
        $id = mysqli_insert_id($con);
        
        if($query) {
            echo 1;
            insertLog($con, "subcategory" , $id, $new_name,'Sub Category add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'subcategory_edit') {

        foreach ($_POST['array1'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/sub category/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));
            $query = mysqli_query($con, "UPDATE `sub_category` SET `image` = '{$new_name}' WHERE id = '{$_POST['scat_id']}' ");
        }

        foreach ($_POST['array2'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/sub category/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));
            $query = mysqli_query($con, "UPDATE `sub_category` SET `banner` = '{$new_name}' WHERE id = '{$_POST['scat_id']}' ");
        }
        
        $query = mysqli_query($con, "UPDATE `sub_category` SET `cat_id` = '{$_POST['cat_id']}', `name` = '{$_POST['name']}' WHERE id = '{$_POST['scat_id']}' ");
        
        if($query) {
            echo 1;
        }
        else {
            echo 2;
        }
    }

?>
