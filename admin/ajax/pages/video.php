<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'video_add') {

        $query1 = mysqli_query($con, "SELECT max(position) FROM `category`");
        $row = mysqli_fetch_assoc($query1);

        $position = $row['max(position)']+1;

        $query = mysqli_query($con, "INSERT INTO `video` (`link`, `status`, `position`) 
            VALUES ('{$_POST['link']}', '{$_POST['status']}', $position) ");
        $id = mysqli_insert_id($con);
        
        if($query) {
            echo 1;
            insertLog($con, "video" , $id, '','Video add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'video_edit') {

        $query = mysqli_query($con, "UPDATE `video` SET `link` = '{$_POST['link']}', `status` = '{$_POST['status']}' 
            WHERE id = '{$_POST['id']}' ");
        
        if($query) {
            echo 1;
            insertLog($con, "video" , $_POST['id'], '','Video update');
        }
        else {
            echo 2;
        }
    }

?>