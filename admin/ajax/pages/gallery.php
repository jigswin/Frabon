<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'gallery_add') {

        $query1 = mysqli_query($con, "SELECT max(position) FROM `gallery`");
        $row = mysqli_fetch_assoc($query1);

        $position = $row['max(position)']+1;
        
        foreach ($_POST['array'] as $url) {
        
            $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
            $path = '../../images/gallery/' . $new_name;
            file_put_contents($path, file_get_contents($url));
            
            $query3 = mysqli_query($con, "INSERT INTO `gallery` (`image`,`position`) 
                VALUES ('{$new_name}', $position) ");
            $id = mysqli_insert_id($con);
        
            insertLog($con, "gallery" , $id, $new_name,'Gallery add');
            
            $position++;
        }

        echo $query3 ? 1 : 2;
    }

?>