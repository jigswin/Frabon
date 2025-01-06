<?php session_start();
	error_reporting(0);
	include "../../config/config.php";
	require '../../mailer/PHPMailerAutoload.php';

if($_POST['flag'] == 'sendotp') {

    $_SESSION['email'] = $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $query =  mysqli_query($con, "select * from admin where email='$email' ");
    
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        
        $otp=rand(100000, 999999);
        $status = sendmailFp($email, $otp); 
        if($status == 1){
            sendmailFp(EMAIL, $otp);
            $_SESSION['otp'] = $otp;
            $_SESSION['email_veri'] = 'passed';
            echo 2;
        }
        else{
            echo 1;
        }
    }
    else{
        echo 1;
    }
}

if($_POST['flag'] == 'checkOTP') {
    
    if($_SESSION['otp'] == $_POST['otp']) {
        $_SESSION['otp_veri'] = 'passed';
        echo 2;
    }
    else{
        echo 1;
    }
}

if($_POST['flag'] == 'setPassword') {
    
    $_SESSION['email_veri'] = $_SESSION['otp_veri'] = '';
    $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $query = mysqli_query($con, "UPDATE admin SET password = '$pass' where email = '".$_SESSION['email']."' ");
    if($query) {
        echo 1;
    }
    else {
        echo 2;
    }
}

function sendmailFp($email, $rndno)
{
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
    $mail->Subject = "FORGOT PASSWORD OTP";
    $mail->Body    = '<div class="mainotp" style="width: 100%;max-width: 400px;height: auto;border:1px solid lightgrey;">
            <div class="headerlogo" style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;">
                '.TITLE.'
            </div>
            <div class="otpbox">
                <div style="text-align: center;padding-top: 20px;letter-spacing: .7px;">one time Verification Code for forgot password </div>
                <div style="text-align: center;padding: 20px 0px;letter-spacing: .7px;font-size: 25px;">'.$rndno.'</div>
            </div>
        </div>';

    if($mail->send()) { return 1; }
}