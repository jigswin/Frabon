<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'brochure_add') {
   
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('pdf');

        if(in_array($fileActualExt, $allowed)) {

            $fileNameNew = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10).'.'.$fileActualExt;
            $fileDestination = '../../images/brochure/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);

            $query1 = mysqli_query($con, "SELECT max(position) FROM `brochure`");
            $row = mysqli_fetch_assoc($query1);

            $position = $row['max(position)']+1;

            $query = mysqli_query($con, "INSERT INTO `brochure` (`name`, `file`, `status`, `position`) 
                VALUES ('{$_POST['name']}', '{$fileNameNew}', 1, $position) ");
            $id = mysqli_insert_id($con);
            
            if($query) {
                echo 1;
                insertLog($con, "brochure" , $id, $fileNameNew,'Brochure add');
            }
            else {
                echo 2;
            }
        }
        else {
            echo 3;
        }
        
    }

    if($_POST['flag'] == 'brochure_edit') {

        if($_FILES['file']['name'] != '') {

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = array('pdf');

            if(in_array($fileActualExt, $allowed)) {

                $fileNameNew = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10).'.'.$fileActualExt;
                $fileDestination = '../../images/brochure/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $query = mysqli_query($con, "UPDATE `brochure` SET `file` = '{$fileNameNew}' WHERE id = '{$_POST['id']}' ");  

                insertLog($con, "brochure" , $_POST['id'], $fileNameNew,'Brochure update');  
            }
            else {
                echo 3;
            }
        }
        
        $query = mysqli_query($con, "UPDATE `brochure` SET `name` = '{$_POST['name']}' WHERE id = '{$_POST['id']}' ");
        
        if($query) {
            echo 1;
        }
        else {
            echo 2;
        }
    }

?>
