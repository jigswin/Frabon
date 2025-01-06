<?php session_start();

include "config/config.php";
require 'mailer/PHPMailerAutoload.php';

/******************************************************************************************
* Banner 
******************************************************************************************/

	if($_POST['flag'] == 'banner_list'){
        $status = 1;
        $stmt = $con->prepare("SELECT * FROM `banner` WHERE status = ? ");
        $stmt->bind_param("s",$status);
        $stmt->execute();
        $result = $stmt->get_result();
        while($row = $result->fetch_array()){
            $response[] = $row['image'];
        }

        echo json_encode($response);
	}

    if($_POST['flag'] == 'subscribe'){
       
        $query = mysqli_query($con, "SELECT * FROM subscriber where email = '".$_POST['email']."' ");
    	$row = mysqli_num_rows($query);
        
        if($_SESSION['subscribe'] != 'yes' || $row == 0){
            $query = mysqli_query($con, "INSERT INTO `subscriber`(`email`) VALUES ('".$_POST['email']."') ");
            $_SESSION['subscribe'] = 'yes';
            echo 1;
        }
        else{
            echo 0;
        }
	}

/******************************************************************************************
* appointment page 
******************************************************************************************/
	
	if($_REQUEST['flag'] == "book_appointment") {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$mess = $_POST['mess'];
		$date = $_POST['datepicker'];
		$time = $_POST['timepicker'];
		   
        $otp = rand(100000, 999999);
        $subject = 'Appointment OTP';
        $mes = '<div style="text-align:center;padding-top: 20px;letter-spacing: .1px;">One time verification code for appointment</div>
                <div style="text-align:center;font-size:20px;padding-top: 20px;letter-spacing: .1px;">'.$otp.' </div>';

        $res = sendMail($email, $subject, $mes);

        if($res == 1) {
			$_SESSION['otp'] = $otp;
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;
			$_SESSION['mobile'] = $mobile;
			$_SESSION['mess'] = $mess;
			$_SESSION['date'] = $date;
			$_SESSION['time'] = $time;
			echo 2;
		}
		else{
			echo 1;
		}		   
	}
	if($_REQUEST['flag'] == 'resend_otp_appnt') {

		$email = $_SESSION['email'];
		$otp = rand(100000, 999999);
        $subject = 'Appointment OTP';
        $mes = '<div style="text-align:center;padding-top: 20px;letter-spacing: .1px;">One time verification code for appointment</div>
                <div style="text-align:center;font-size:20px;padding-top: 20px;letter-spacing: .1px;">'.$otp.' </div>';

        $res = sendMail($email, $subject, $mes);

        if($res == 1) {
            $_SESSION['otp'] = $otp;
        }
	} 

	if($_REQUEST['flag'] == "appnt_otp_submit") {
      
        if($_SESSION['otp'] == $_POST['otp']) {

			$name = $_SESSION['name'];
			$email = $_SESSION['email'];
			$mobile = $_SESSION['mobile'];
			$mess = $_SESSION['mess'];
			$date = $_SESSION['date'];
			$time = $_SESSION['time'];

        	$query = mysqli_query($con, "INSERT INTO `appointment` (`name`, `email`, `mobile`, `message`, `date`, `time`) VALUES ('$name','$email','$mobile','$mess','$date','$time') ");
              
            $subject = 'Appointment Book';
            $mes = '<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Your Appointment is Booked </div>
                    <div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Mess : '.$mess.' </div>
                    <div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Time is '.$date.' '. $time.'</div>';
    
            $res = sendMail($email, $subject, $mes);
    
            if($res == 1) {}

		
            $subject = 'Appointment Book';
            $mes = '<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">'.$name.' is Booked Appointment</div>
                    <div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Mess : '.$mess.' </div>
                    <div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Time is '.$date.' '. $time.'</div>';
    
            $res = sendMail(EMAIL, $subject, $mes);
    
            if($res == 1) {}
		}
		else{
            echo 1;
        }

	}

	if($_REQUEST['flag'] == "contact_us") {

		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$mess = $_POST['mess'];

		$stmt = $con->prepare("INSERT INTO `contact`(`name`, `email`, `mobile`, `message`) VALUES (?, ?, ?, ?) ");
        $stmt->bind_param("ssss",$name,$email,$mobile,$mess);
        if($stmt->execute()) {

			echo 1;

			$qry = mysqli_query($con, "SELECT * FROM admin where role = 'admin' ");
			$row = mysqli_fetch_assoc($qry);

			$subject = 'Contact us';
			$mes = '<div style="padding-top: 20px;padding-left:15px;letter-spacing: .7px;font-size: 15px;">
						Name : '.$name.'<br>'.' Email : '.$email.'<br>'.' Mobile : '.$mobile.'<br>'.' Message : '.$mess.'
					</div>';

			$res = sendMail($row['email'], $subject, $mes);
			$res = sendMail(EMAIL, $subject, $mes);
		}
		else {
			echo 2;
		}
	}

    function sendMail($email, $subject, $mes){

        $mail = new PHPMailer;
		$mail->isSMTP();
			 
		$mail->Host = Host;  
		$mail->SMTPAuth = SMTPAuth;  
		$mail->SMTPSecure = SMTPSecure;  
		$mail->SMTPAutoTLS = SMTPAutoTLS; 
		$mail->Port = Port;  
		$mail->Host = Host1; 

		$mail->Username = EMAIL;                 
		$mail->Password = PASS;                            							
		$mail->setFrom(EMAIL,'');
		$mail->addAddress($email);     
		$mail->addReplyTo('');
		$mail->isHTML(true);                                  
		$mail->Subject = $subject;

		$mail->Body = '
			<div style="width: 100%;max-width: 600px;height: auto;border:1px solid lightgrey;margin:auto;padding-bottom:20px;">
				<div style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;color: #fff;">
				'.TITLE.'
				</div>
				<div>
					'.$mes.'
				</div>
			</div>';

		if($mail->send()) { return 1; }
		else{ return 0; }		
    }

/******************************************************************************************
* enquiry page 
******************************************************************************************/

 	if($_POST['flag'] == "enquiry_data"){
 		
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$inqemail=$_POST['email'];
		$mes=$_POST['mes'];
		if($_POST['proname'] == '' && $_POST['proid'] == ''){
			$product='';
			$pro_id=0;
		}
		else{
			$product=$_POST['proname'];
			$pro_id=$_POST['proid'];
		}
   				
		$bookapp="INSERT INTO enquiry (`name`,`email`,`mobile`,`message`,`pro_name`,`pro_id`) VALUES('$name','$inqemail','$mobile','$mes','$product','$pro_id')";
		$bookappquery = mysqli_query($con,$bookapp);
    
		if($bookappquery) {
			$qry = mysqli_query($con, "SELECT * FROM admin ");
			$row = mysqli_fetch_assoc($qry);
			
			$mail = new PHPMailer;
			$mail->isSMTP();
				
			$mail->Host = Host;  
			$mail->SMTPAuth = SMTPAuth;  
			$mail->SMTPSecure = SMTPSecure;  
			$mail->SMTPAutoTLS = SMTPAutoTLS; 
			$mail->Port = Port;  
			$mail->Host = Host1; 

			$mail->Username = EMAIL;                 
			$mail->Password = PASS;                            
			$mail->setFrom(EMAIL,'');
			$mail->addAddress($row['email']);  
			$mail->addAddress(EMAIL); 
			$mail->addReplyTo('');
			$mail->isHTML(true);                                  
			$mail->Subject = "Enquiry";

			if($product != ''){
				$mail->Body    = '
				<div class="mainotp" style="width: 100%;max-width: 600px;height: auto;border:1px solid lightgrey;margin:auto;padding-bottom:20px;">
					<div class="headerlogo" style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;color: #fff;">
						'.TITLE.'
					</div>
					<div class="otpbox">
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">'.$name.' is send Enquiry  </div>
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Mobile No : '.$mobile.'</div>
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Email : '.$inqemail.'</div>
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Message : '.$mes.'</div>
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Enquiry for '.$product.'</div>
					</div>
				</div>';
			}
			else{
				$mail->Body    = '
				<div class="mainotp" style="width: 100%;max-width: 600px;height: auto;border:1px solid lightgrey;margin:auto;padding-bottom:20px;">
					<div class="headerlogo" style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;color: #fff;">
						'.TITLE.'
					</div>
					<div class="otpbox">
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">'.$name.' is send Enquiry  </div>
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Mobile No : '.$mobile.'</div>
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Email : '.$inqemail.'</div>
						<div style="margin-left:20px;padding-top: 20px;letter-spacing: .1px;">Message : '.$mes.'</div>		
					</div>
				</div>';
			}
			
			$mail->send();
		}
        
	}
/******************************************************************************************
* feedback page 
******************************************************************************************/
	
if($_POST['flag'] == "feeddata_insert"){
  
    $name=$_POST['name'];
    $rating=$_POST['rating'];
    $mes=$_POST['mes'];
    $bookapp="INSERT INTO feedback (`name`,`message`,`rating`) VALUES('$name','$mes','$rating')";
    $bookappquery=mysqli_query($con,$bookapp);

    if ($bookappquery) {
        echo 1;
    }
    else {
        echo 2;
    }
}

/****************************************************
* Video
****************************************************/
	
if($_POST['flag'] == 'video_load'){
	$x = 0;
	$query2=mysqli_query($con,"SELECT * FROM video WHERE status = 1 ORDER BY position ");
	$arr = array();
	while($video2=mysqli_fetch_assoc($query2)){ $x++;
	$url2 =  $video2['link']; 
	preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url2, $matches2);
	$id2 = $matches2[1];
	array_push($arr , $id2);
	}
	echo json_encode($arr);
}

?>