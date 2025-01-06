<?php 
    session_start(); 
    include "../../config/config.php";

    if($_POST['flag'] == 'visitors') {

        $response['unique'] = $response['existing'] = $response['date'] = array();

        for ($i = 0; $i < 15 ; $i++) { 
           
            $date = date("Y-m-d", strtotime(date("Y-m-d").'- '.$i.' days'));

            /* unique */

            $query = mysqli_query($con, "SELECT * FROM `visitor` WHERE date like '%$date%' ");

            array_push($response['unique'], mysqli_num_rows($query));

            /* existing */

            $count = 0;
            $query = mysqli_query($con, "SELECT * FROM `visitor_report` WHERE date = '{$date}' ");
            while($row = mysqli_fetch_assoc($query)) {

                $query1 = mysqli_query($con, "SELECT * FROM `visitor` WHERE id = '{$row['visitor_id']}' AND date like '%$date%' ");
                if(mysqli_num_rows($query1) == 0) {
                    $count++;
                }
            }

            array_push($response['existing'], $count);
        
            /* date */

            array_push($response['date'], explode("-", $date)[2].'-'.explode("-", $date)[1]);
        }
        
        echo json_encode($response);
    }
?>