<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'contact_add') {

        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $map_link = $_POST['map_link'];
        $status = 1;

        $query = mysqli_query($con, "SELECT max(position) FROM `contact_us`");
        $row = mysqli_fetch_assoc($query);

        $position = $row['max(position)']+1;

        $stmt = $con->prepare("INSERT INTO `contact_us` (`address`, `mobile`, `email`, `location`, `map_link`,`status`, `position`) VALUES (?, ?, ?, ?, ?, ?, ?) ");
        $stmt->bind_param("sssssss", $address, $mobile, $email, $location, $map_link, $status, $position);
        
        if($stmt->execute()) {
            echo 1;
            $id = $con->insert_id;
            insertLog($con, "contact us" , $id, '','Contact us add'); 
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'contact_edit') {

        $id = $_POST['id'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $location = $_POST['location'];
        $map_link = $_POST['map_link'];

        $stmt = $con->prepare("UPDATE `contact_us` SET `address` = ?, `mobile` = ?, `email` = ?, `location` = ?, `map_link` = ? where id = ? ");
        $stmt->bind_param("ssssss", $address, $mobile, $email, $location, $map_link, $id);
        
        if($stmt->execute()) {
            echo 1;
            insertLog($con, "contact us" , $id, '','Contact us update'); 
        }
        else {
            echo 2;
        }
    }

?>