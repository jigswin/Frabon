<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'job_add') {

        $query = mysqli_query($con, "INSERT INTO `job` (`title`, `description`, `min_salary`, `max_salary`, `vacancy`, `location`, `work_days`, `timings`, `education`, `type`, `experience`, `gender`, `date`, `status`) 
            VALUES (
                '{$_POST['title']}', 
                '{$_POST['description']}', 
                '{$_POST['min_salary']}', 
                '{$_POST['max_salary']}', 
                '{$_POST['vacancy']}', 
                '{$_POST['location']}', 
                '{$_POST['work_days']}', 
                '{$_POST['timings']}', 
                '{$_POST['education']}', 
                '{$_POST['type']}', 
                '{$_POST['experience']}', 
                '{$_POST['gender']}', 
                '{$_POST['date']}', 
                1 
            ) ");
        
        if($query) {

            $id = mysqli_insert_id($con);
            insertLog($con, "job" , $id, '','Job add'); 

            echo 1;
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'job_edit') {
        
        $query = mysqli_query($con, "UPDATE `job` SET 
            `title` = '{$_POST['title']}', 
            `description` = '{$_POST['description']}', 
            `min_salary` = '{$_POST['min_salary']}', 
            `max_salary` = '{$_POST['max_salary']}', 
            `vacancy` = '{$_POST['vacancy']}', 
            `location` = '{$_POST['location']}', 
            `work_days` = '{$_POST['work_days']}', 
            `timings` = '{$_POST['timings']}', 
            `education` = '{$_POST['education']}', 
            `type` = '{$_POST['type']}', 
            `experience` = '{$_POST['experience']}', 
            `gender` = '{$_POST['gender']}' 
            WHERE id = '{$_POST['id']}' ");
        
        if($query) {
            
            insertLog($con, "job" , $_POST['id'], '','Job update'); 
            
            echo 1;
        }
        else {
            echo 2;
        }
    }
    
    if($_POST['flag'] == 'change_status') {
        $query = mysqli_query($con, "SELECT * FROM `job` WHERE id = '{$_POST['id']}' ");
        $row = mysqli_fetch_assoc($query);
        
        if($row['status'] == 1) 
        $status = 0;
        else 
        $status = 1;
        
        $query = mysqli_query($con, "UPDATE `job` SET status = $status WHERE id = '{$_POST['id']}' ");
        
        if($query) {
            echo 1;
        }
        else {
            echo 2;
        }
    }
    if($_POST['flag'] == 'delete_job') {
        $query = mysqli_query($con, "DELETE FROM `job` WHERE id = '{$_POST['id']}' ");
        if($query) {
            echo 1;
        }
        else {
            echo 2;
        }
    }
?>
