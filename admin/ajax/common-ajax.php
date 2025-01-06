<?php 
    session_start(); 
    include "../../config/config.php";

    if($_POST['flag'] == 'delete_rows') {

        $rows = ''; $count = 0; $table_name = $_POST['table_name']; $table_id = $_POST['table_id'];

        foreach ($_POST['id'] as $value) {

            if($count == 0) {
                $rows .= '`' . $table_id .'` = ' . $value;
                $count++;
            }
            else {
                $rows .= ' OR ' . '`' . $table_id .'` = ' . $value;
            }
        }
        
        $query = mysqli_query($con, "DELETE FROM `{$table_name}` WHERE $rows ");
        
        if($query) {
            echo 1;

            if($_POST['table_name'] == "theme") {
                $qry = mysqli_query($con, "SELECT count(theme_id) as count FROM theme WHERE status = 1");
                $row = mysqli_fetch_assoc($qry);
                if($row["count"] == 0) {
                    $query1 = mysqli_query($con, "UPDATE `theme` SET `status` = 1 WHERE `theme_id` = 1 ");
                }
            }

            foreach ($_POST['id'] as $val) {
                insertLog($con, $table_name , $val, '','Delete '.$table_name); 
            }
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'change_status') {

        $table_name = $_POST['table_name']; $table_id = $_POST['table_id'];

        $query = mysqli_query($con, "UPDATE `{$table_name}` SET `status` = '{$_POST['status']}' WHERE `{$table_id}` = '{$_POST['id']}' ");
        
        if($query) {
            echo 1;
		    insertLog($con, $table_name , $_POST['id'], '','Change status '.$_POST['status']); 
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'save_text') {

        $table = $_POST['table'];
        $text = $_POST['text'];

        $stmt = $con->prepare("UPDATE `{$table}` SET `text` = ? ");
        $stmt->bind_param("s", $text);
        
        if($stmt->execute()) {
            echo 1;
            insertLog($con, $table , 0, '',$table.' update'); 
        }
        else {
            echo 2;
        }
    }

    
    if($_POST['flag'] == 'payment_add') { 

        foreach ($_POST['array'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../images/payment/' . $new_name;
            
            file_put_contents($path, file_get_contents($url));

            $query = mysqli_query($con, "INSERT INTO `payment` (`image`) 
            VALUES ('{$new_name}') ");
            $id = mysqli_insert_id($con);
            
            insertLog($con, "payment" , $id, $new_name,'QR add'); 
        }

        if($query) {
            echo 1;
        }
        else {
            echo 2;
        }
    }
    
    if($_POST['flag'] == 'save_image') { 
        $res = array();
        $res['link'] = array();
        $res['path'] = $_SESSION['path'];
        foreach ($_POST['images'] as $url) {
            
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 5) . '.jpg';
            $path = '../images/upload/' . $new_name;
            array_push($res['link'], $new_name);
            file_put_contents($path, file_get_contents($url));
        }
        echo json_encode($res);
    }

    if($_POST['flag'] == "change_position") {
        $table = $_POST['table'];
        $primary_key = $_POST['key'];
        
        foreach ($_POST['arr'] as $key => $val) {
            $pos = $key + 1;
            $query = mysqli_query($con, "UPDATE `$table` SET position = '{$pos}' WHERE `$primary_key` = '{$val}' ");
        }
        echo 1;
    }
?>