<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'service_add') { 

        $name = $_POST['name'];
        $text = $_POST['text'];
        $status = 1;

        $query1 = mysqli_query($con, "SELECT max(position) FROM `service`");
        $row = mysqli_fetch_assoc($query1);

        $position = $row['max(position)']+1;


        $stmt = $con->prepare("INSERT INTO `service` (`name`, `text`, `status`, `position`) VALUES (?, ?, ?, ?) ");
        $stmt->bind_param("ssss", $name,$text,$status,$position);

        if($stmt->execute()) {
            echo 1;
            $id = $con->insert_id;
            insertLog($con, "service" , $id, '','Service add'); 
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'service_edit') { 

        $name = $_POST['name'];
        $text = $_POST['text'];
        $id = $_POST['id'];

        $stmt = $con->prepare("UPDATE `service` SET `name` = ?, `text` = ? WHERE id = ? ");
        $stmt->bind_param("sss", $name,$text,$id);

        if($stmt->execute()) {
            echo 1;
            insertLog($con, "service" , $id, '','Service update');
        }
        else {
            echo 2;
        }
    }

?>