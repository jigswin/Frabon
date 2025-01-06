<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'category_add') {

        $query = mysqli_query($con, "SELECT max(position) FROM `category`");
        $row = mysqli_fetch_assoc($query);

        $position = $row['max(position)']+1;

        foreach ($_POST['array'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/category/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));            
        }

        $query = mysqli_query($con, "INSERT INTO `category` (`name`, `image`, `status`, `position`) 
            VALUES ('{$_POST['name']}', '{$new_name}', 1, $position) ");
        $id = mysqli_insert_id($con);
        
        $position++;
        
        if($query) {
            echo 1;
            insertLog($con, "category" , $id, $new_name,'Category add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'category_edit') {

        foreach ($_POST['array'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/category/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));       
            $query = mysqli_query($con, "UPDATE `category` SET `image` = '{$new_name}' WHERE id = '{$_POST['cat_id']}' ");  
            insertLog($con, "category" , $_POST['cat_id'], $new_name,'Category update');   
        }
        
        $query = mysqli_query($con, "UPDATE `category` SET `name` = '{$_POST['name']}' WHERE id = '{$_POST['cat_id']}' ");
        
        if($query) {
            echo 1;
        }
        else {
            echo 2;
        }
    }

?>
