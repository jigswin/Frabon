<?php 
    session_start(); 
    include "../../../config/config.php";

    if($_POST['flag'] == 'getOrderDetail'){
        $query = mysqli_query($con, "SELECT * FROM order_list where order_id = '".$_POST['order_id']."' ");
        $row = mysqli_fetch_assoc($query); 
        $del_charge = $row['delivery_charge'];
        $total = 0;
    ?>
    
    <div class="cRTI8 mb-3">
        <div class="KeCex">
            <div class="AD1JT"><b>Order ID : </b><?php echo $row['order_id'] ?></div>
            <div class="AD1JT"><b>Order Date : </b><?php echo explode(" ", $row['date'])[0] ?></div>
            <div class="AD1JT"><b>Pay Mode : </b><?php echo $row['pay_mode'] ?></div>
        </div>
        <div class="OU1qe">
            <div class="uUKZT mt-3"><b>Shipping Address :</b></div>
            <div class="uUKZT"><?php echo $row['name'] ?></div>
            <div class="uUKZT"><?php echo $row['address'] ?></div>
            <div class="uUKZT"><?php echo $row['area'] ?> - <?php echo $row['pincode'] ?></div>
            <div class="uUKZT"><b>Mobile : </b><?php echo $row['mobile'] ?></div>
        </div>
    </div>
    <div class="EaNb1">
        <div class="Ssr6K">
            <div class=""></div>
            <a href="../invoice/Invoice-<?php echo $row['order_id'] ?>.pdf" download="invoice-<?php echo $row['order_id'] ?>.pdf"><div class="hxRwT mb-2"><b>INVOICE</b></div></a>
        </div>

        <?php 
            $query1 = mysqli_query($con, "SELECT * FROM order_detail where order_id = '".$row['order_id']."' ");
            while($row1 = mysqli_fetch_assoc($query1)){
                $total += $row1['total'];
                $query2 = mysqli_query($con, "SELECT * FROM product as p, product_detail as pd where p.id = '{$row1['prod_id']}' AND pd.prod_id = '{$row1['prod_id']}' AND pd.size = '{$row1['size']}' ");
                $row2 = mysqli_fetch_assoc($query2);
        ?>
        <div class="A2yFT">
            <div class="uID74">
                <a href="../product/<?php echo str_replace(' ', '-', $row2["name"]) ?>"><img src="images/product/<?php echo explode(",", $row2['image'])[0] ?>" alt="Product Img"></a>
            </div>
            <div class="tuEyh">
                <div class="UuHhc"><a href="../product/<?php echo str_replace(' ', '-', $row2["name"]) ?>"><b><?php echo $row2['name']." ".$row2['size'] ?></b></div></a>
                <div class="oJWOV">
                    <div class="KehRt"><i class="fal fa-rupee-sign"></i><?php echo $row1['price'] ?></div>
                    <div class="A1uvD">QTY <?php echo $row1['qty'] ?></div>
                </div>
                <?php echo $row1['type'] ?>
            </div>
            <div class="p8p97">
                <i class="fal fa-rupee-sign"></i><?php echo $row1['total'] ?>
            </div>
        </div>

        <?php } ?>
        <div class="vMg6w">
            <div class="UqC3h"><b>Subtotal : </b><i class="fal fa-rupee-sign"></i><?php echo $total ?></div>
            <div class="UqC3h"><b>Delivery Charge : </b><i class="fal fa-rupee-sign"></i><?php echo $del_charge ?></div>
            <div class="UqC3h"><b>Final Total : </b><i class="fal fa-rupee-sign"></i><?php echo $total+$del_charge ?></div>
        </div>
    </div>

    <?php 
    }

    if($_POST['flag'] == 'getPaymentDetail'){
        $query = mysqli_query($con, "SELECT * FROM razor_pay where order_id = '".$_POST['order_id']."' ");
        $row = mysqli_fetch_assoc($query); 
        
        echo '
        <div class="txknd">
            <div class="TpT6f"><b>Order ID : </b>'.$row['order_id'].'</div>
            <div class="TpT6f"><b>Payment ID : </b>'.$row['payment_id'].'</div>
            <div class="TpT6f"><b>Razorpay Order ID : </b>'.$row['razorpay_order_id'].'</div>
            <div class="TpT6f"><b>Status : </b>'.$row['status'].'</div>
            <div class="TpT6f"><b>Date : </b>'.$row['date'].'</div>
        </div>
        ';
    }    

    if($_POST['flag'] == 'change_order_status'){

        $response = array(); $response['dboy'] = array();

        foreach ($_POST["arr"] as $key => $val) {

            $query = mysqli_query($con, "SELECT * FROM `order_list` WHERE order_id = '{$val}' ");
            $row = mysqli_fetch_assoc($query);

            if($_POST["dBoy"]) {
                $dBoy = $_POST["dBoy"];
                $query1 = mysqli_query($con, "SELECT * FROM `delivery_boy` WHERE id = '{$dBoy}' ");
                $row1 = mysqli_fetch_assoc($query1);
                array_push($response['dboy'], $row1['name']);
            }
            else {
                $area = $row['area'];
                $query1 = mysqli_query($con, "SELECT * FROM `delivery_boy` WHERE area LIKE '%$area%' ");
                $row1 = mysqli_fetch_assoc($query1);
                $dBoy = $row1["id"];
                array_push($response['dboy'], $row1['name']);
            }
            
            if($row['status'] == 'Accepted') {
                if($_POST['status'] != 'Accepted') {
                    $query = mysqli_query($con, "DELETE FROM `delivery` WHERE order_id = '{$val}' ");
                }
                else {
                    if($_POST['dBoy']) {
                        $query = mysqli_query($con, "UPDATE `delivery` SET d_boy_id = '{$_POST['dBoy']}' WHERE order_id = '{$val}' ");      
                    }
                }
            }
            else if($_POST['status'] == 'Accepted') {
                $query = mysqli_query($con, "INSERT INTO `delivery` (`order_id`, `d_boy_id`, `status`, `dispatched_date`, `dispatched_time`, `delivery_date`, `delivery_time`) 
                    VALUES ('{$val}', '{$dBoy}', 'Pending', '', '', '', '') ");
            }

            $query = mysqli_query($con, "UPDATE `order_list` SET status = '{$_POST['status']}' WHERE order_id = '{$val}' ");
        }
        
        $response['flag'] = 1;
        echo json_encode($response);
    }

?>