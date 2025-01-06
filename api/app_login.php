<?php 
    require_once '../config/config.php';
    $response = array();

    if($_POST['flag'] == 'sendOTP') {

        if($_POST['email'] == '') {
            $response['flag'] = 2;
            $response['message'] = "Required parameters missing";
        }
        else {
            
            $otp = rand(100000, 999999);
			$body = '
				<div style="width: 100%;max-width: 400px;height: auto;border:1px solid lightgrey;">
					<div style="background: linear-gradient( 120deg, #155799, #159957);color:#FFF;font-size: 30px;text-align: center;padding: 10px;color:#fff">
						'.TITLE.'
					</div>
					<div>
						<div style="text-align: center;padding-top: 20px;letter-spacing: .7px;">Verification code </div>
						<div style="text-align: center;padding: 20px 0px;letter-spacing: .7px;font-size: 25px;">'.$otp.'</div>
					</div>
				</div>';

			require_once '../mailer/PHPMailerAutoload.php';

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
			$mail->addAddress($_POST['email']);     
			$mail->addReplyTo('');
			$mail->isHTML(true);                                  
			$mail->Subject = "Verify Email";
			$mail->Body    = $body;

			if($mail->send()){ 

				$response['flag'] = 1;
            	$response['message'] = 'Verification OTP send in your email';
            	$response['otp'] = $otp;
			}
			else{ 

                $response['flag'] = 2;
            	$response['message'] = 'Email not valid';
            }
        }
	}

    if($_POST['flag'] == 'insertData') {

        if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['mobile'] == '') {
            $response['flag'] = 2;
            $response['message'] = "Required parameters missing";
        }
        else {

            $query = mysqli_query($con, "SELECT * FROM `app_data` WHERE email = '{$_POST['email']}' ");

            if(mysqli_num_rows($query) == 0) {

                $qry = mysqli_query($con, "INSERT INTO `app_data` (`name`, `email`, `mobile`) 
                    VALUES ('{$_POST['name']}', '{$_POST['email']}', '{$_POST['mobile']}') ");
                
                if($qry) {
                    $response['flag'] = 1;
                    $response['message'] = "Login Successfully";
                }
            }
            else {
                $response['flag'] = 1;
                $response['message'] = "Already Exist";
            }
        }
    }

    echo json_encode($response);
?>