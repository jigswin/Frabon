<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'product_add') {

        $query1 = mysqli_query($con, "SELECT max(position) FROM `product`");
        $row = mysqli_fetch_assoc($query1);

        $position = $row['max(position)']+1;

        $query = mysqli_query($con, "INSERT INTO `product` (`cat_id`, `name`, `description`, `size`, `price`, `stock`, `status`, `position`) 
            VALUES ('{$_POST['category']}', '{$_POST['name']}', '{$_POST['description']}', '{$_POST['size']}', '{$_POST['price']}', '{$_POST['stock']}', 1, $position) ");
        
        if($query) {

            $id = mysqli_insert_id($con);

            $attr; $val;
            foreach ($_POST['cust_field'][0] as $key => $data) {
                if($key == 0) {
                    $attr = "`".$data."`";
                    $val = "'".$_POST['cust_field'][1][$key]."'";
                } else {
                    $attr .= ",`".$data."`";
                    $val .= ",'".$_POST['cust_field'][1][$key]."'";
                }
            }

            if($attr == '')
                $query2 = mysqli_query($con, "INSERT INTO `product_fields` (`prod_id`) VALUES ($id)");
            else
                $query2 = mysqli_query($con, "INSERT INTO `product_fields` (`prod_id`, $attr) VALUES ($id, $val)");
            
            insertLog($con, "product" , $id, '','Product add'); 

            foreach ($_POST['array'] as $url) {
                
                $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
                $path = '../../images/product/' . $new_name;
                
                file_put_contents($path, file_get_contents($url));      
                $query = mysqli_query($con, "INSERT INTO `product_image` (`pro_id`, `image`) 
                    VALUES ('{$id}', '{$new_name}') ");     
            }

            echo 1;
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'product_edit') {
        
        $query = mysqli_query($con, "UPDATE `product` SET 
            `cat_id` = '{$_POST['category']}', `name` = '{$_POST['name']}', `description` = '{$_POST['description']}', `size` = '{$_POST['size']}', 
            `price` = '{$_POST['price']}', `stock` = '{$_POST['stock']}' 
            WHERE id = '{$_POST['id']}' ");
        
        if($query) {

            $attr; $val;
            foreach ($_POST['cust_field'][0] as $key => $data) {
                if($key == 0) {
                    $val = "`".$data."` = '".$_POST['cust_field'][1][$key]."'";
                } else {
                    $val .= ", `".$data."` = '".$_POST['cust_field'][1][$key]."'";
                }
            }

            if($val != '')
                $query2 = mysqli_query($con, "UPDATE `product_fields` SET $val WHERE prod_id = '{$_POST['id']}' ");

            insertLog($con, "product" , $_POST['id'], '','Product update'); 
             
            foreach ($_POST['array'] as $url) {
                
                $new_name = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10) . '.jpg';
                $path = '../../images/product/' . $new_name;
                
                file_put_contents($path, file_get_contents($url));      
                $query = mysqli_query($con, "INSERT INTO `product_image` (`pro_id`, `image`) 
                    VALUES ('{$_POST['id']}', '{$new_name}') ");      
            }

            echo 1;
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'add_field') {
        $name = $_POST['field_name'];
        $type = $_POST['field_type'];

        $name = str_replace(' ', '_', $name);

        $query = mysqli_query($con, "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='product_fields' AND COLUMN_NAME='{$name}' ");
        if(mysqli_num_rows($query) == 0) {
            if($type == "text") {
                $query = mysqli_query($con, "ALTER TABLE `product_fields` ADD `$name` VARCHAR(255) NOT NULL");
            }
            else if($type == "textarea") {
                $query = mysqli_query($con, "ALTER TABLE `product_fields` ADD `$name` TEXT NOT NULL");
            }
            else if($type == "date") {
                $query = mysqli_query($con, "ALTER TABLE `product_fields` ADD `$name` DATE NOT NULL");
            }

            echo $query ? 1 : 3;
        }
        else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'get_field_list') {
        $data = array();
        $query = mysqli_query($con, "SELECT `COLUMN_NAME`, `COLUMN_TYPE` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='product_fields' ");
        while($row = mysqli_fetch_assoc($query)) {
            if($row['COLUMN_NAME'] != 'id' || $row['COLUMN_NAME'] != 'prod_id') {
                if($row['COLUMN_TYPE'] == 'varchar(255)') {
                    $data[] = array(
                        'name' => $row['COLUMN_NAME'],
                        'type' => 'text'
                    );
                }
                else if($row['COLUMN_TYPE'] == 'text') {
                    $data[] = array(
                        'name' => $row['COLUMN_NAME'],
                        'type' => 'textarea'
                    );
                }
                else if($row['COLUMN_TYPE'] == 'date') {
                    $data[] = array(
                        'name' => $row['COLUMN_NAME'],
                        'type' => 'date'
                    );
                }
            }
        }
        echo json_encode($data);
    }

    if($_POST['flag'] == 'delete_field') {
        $name = $_POST['name'];

        $query = mysqli_query($con, "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='product_fields' AND COLUMN_NAME='{$name}' ");
        if(mysqli_num_rows($query) == 1) {
            $query = mysqli_query($con, "ALTER TABLE `product_fields` DROP `$name`");
            echo $query ? 1 : 3;
        }
        else {
            echo 2;
        }
    }

?>
