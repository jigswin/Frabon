<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'testimony_add') {

        foreach ($_POST['array'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/testimony/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));            
        }

        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $status = 1;

        $stmt = $con->prepare("INSERT INTO `testimony` (`name`, `image`, `description`, `status`) VALUES (?, ?, ?, ?) ");
        $stmt->bind_param("ssss", $name,$new_name,$desc,$status);
        
        if($stmt->execute()) {
            echo 1;
            $id = $con->insert_id;
            insertLog($con, "testimony" , $id, '','Testimony add');
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'testimony_edit') {

        foreach ($_POST['array'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/testimony/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));       
            $query = mysqli_query($con, "UPDATE `testimony` SET `image` = '{$new_name}' WHERE id = '{$_POST['id']}' ");     
        }

        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $id = $_POST['id'];
       
        $stmt = $con->prepare("UPDATE `testimony` SET `name` = ?, `description` = ? WHERE id = ? ");
        $stmt->bind_param("sss", $name,$desc,$id);
        
        if($stmt->execute()) {
            echo 1;
            insertLog($con, "testimony" , $id, '','Testimony update');
        }
        else {
            echo 2;
        }
    }

?>
