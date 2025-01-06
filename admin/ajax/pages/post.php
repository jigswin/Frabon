<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'post_add') {

        $text = $_POST['text'];
        $status = 1;

        $query = mysqli_query($con, "SELECT max(position) FROM `blog`");
        $row = mysqli_fetch_assoc($query);

        $position = $row['max(position)']+1;

        $stmt = $con->prepare("INSERT INTO `blog` (`content`, `status`, `position`) VALUES (?, ?, ?) ");
        $stmt->bind_param("sss", $text, $status, $position);

        $position++;
        
        if($stmt->execute()) {
            echo 1;
            $id = $con->insert_id;
            insertLog($con, "post" , $id, '','Post add'); 
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'post_edit') {

        $text = $_POST['text'];
        $id = $_POST['id'];

        $stmt = $con->prepare("UPDATE `blog` SET `content` = ? WHERE blog_id = ? ");
        $stmt->bind_param("ss", $text, $id);
        
        if($stmt->execute()) {
            echo 1;
            insertLog($con, "post" , $id, '','Post update'); 
        }
        else {
            echo 2;
        }
    }

?>