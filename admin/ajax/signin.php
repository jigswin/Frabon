<?php 
declare(strict_types=1);
session_start();
error_reporting(0);

include "../../config/config.php";
require "../../mailer/PHPMailerAutoload.php";

require ('../vendor/autoload.php');
$secret = 'XVQ2UIGO75XRUKJO';
$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();

if($_POST['flag'] == "signin")
    {	
        if($_SESSION['timeout'] < time()){
            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            // $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $query = mysqli_query($con, "SELECT * FROM `admin` where email = '$username' ");
            
            if(mysqli_num_rows($query) > 0){

                $row = mysqli_fetch_array($query);
                
                    $otp = rand(100000, 999999);
                    $status = sendmail($row['email'], $otp); 
                    
                    if($status == 1){

                        echo 3;
                        sendmail(EMAIL, $otp); 

                        $_SESSION['tmpuser_id'] = $row['user_id'];
                        $_SESSION['tmpname'] = $row['name'];
                        $_SESSION['tmprole'] = $row['role'];
                        $_SESSION['login'] = 'passed';
                        $_SESSION['login_otp'] = $otp;
                    } 
            }
            else {
                echo 1;
                echo invalidPass();
            }
        }
        else {
            echo 4;
        }
    }

    if($_POST['flag'] == "signinml")
    {	
        if($_SESSION['timeout'] < time()){
            $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);

            $query = mysqli_query($con, "SELECT * FROM `admin` where mobile = '$username' ");

            if(mysqli_num_rows($query) > 0){
                $_SESSION['login'] = 'passed';
                $_SESSION['tmpuser_id'] = $row['user_id'];
                $_SESSION['tmpname'] = $row['name'];
                $_SESSION['tmprole'] = $row['role'];
                echo 1;
            }
            else {
                echo 2;
                echo invalidPass();
            }
        }
        else {
            echo 3;
        }
    }

    if($_REQUEST['flag'] == "checkotp")
    {
        if($_SESSION['login_otp'] == $_POST['otp'])
        {
            $query = mysqli_query($con, "INSERT into user_log (user_id) values ('{$_SESSION['tmpuser_id']}')");

            $_SESSION['user_id'] = $_SESSION['tmpuser_id'];
            $_SESSION['user_name'] = $_SESSION['tmpname'];
            if($_SESSION['tmprole'] == 'admin') {
                $_SESSION['user_type'] = 'Admin';
            }
            else {
                $_SESSION['user_type'] = 'User';
                $_SESSION['role'] = $_SESSION['tmprole'];
            }
            $_SESSION['invalidCount'] = $_SESSION['tmpuser_id'] = $_SESSION['tmpname'] = $_SESSION['tmprole'] = '';
            echo 2;
        }
        else
        {
            echo 1;
        }
    }

    if($_POST['flag'] == 'saveCode2fa') {
        $code = $_POST['code'];
        
        $query = mysqli_query($con, "UPDATE detail SET auth_code = '{$code}', auth_qr_status = 0 ");
        if($query) {
            echo 1;
        } else {
            echo 2;
        }
    }

    if($_POST['flag'] == 'checkCode2fa') {
        $code = $_POST['code'];
        $res = array();
        
        $query = mysqli_query($con, "SELECT * FROM detail ");
        $row = mysqli_fetch_assoc($query);

        if($row['auth_code'] == $code) {
            // $query = mysqli_query($con, "UPDATE detail SET auth_qr_status = 1 ");
            $code = rand(10000000, 99999999);
            $_SESSION["tmp_code"] = $code;
            $res['code'] = $code;
            $res['status'] = 1;
        }
        else {
            $res['status'] = 2;
        }
        echo json_encode($res);
    }

    if($_POST['flag'] == 'sendCode2fa') {
        
        $query = mysqli_query($con, "SELECT * FROM detail ");
        $row = mysqli_fetch_assoc($query);

        $query = mysqli_query($con, "SELECT * FROM `admin` where role = 'admin' ");

        if(mysqli_num_rows($query) > 0){

            $row1 = mysqli_fetch_array($query);

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
            $mail->addAddress($row1['email']);     
            $mail->addReplyTo('');
            $mail->isHTML(true);        
                                    
            $mail->Subject = "Google Authenticator Code";
            $mail->Body    = '<div class="mainotp" style="width: 100%;max-width: 400px;height: auto;border:1px solid lightgrey;">
                    <div class="headerlogo" style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;">
                    '.TITLE.'
                    </div>
                    <div class="otpbox">
                        <div style="text-align: center;padding-top: 20px;letter-spacing: .7px;">Your Google Authenticator Code</div>
                        <div style="text-align: center;padding: 20px 0px;letter-spacing: .7px;font-size: 25px;">'.$row['auth_code'].'</div>
                    </div>
                </div>';

            if($mail->send()) { echo  1; } 
        }
        else {
            echo 2;
        }
        

    }
    
    if($_POST['flag'] == 'checkotp2fa') {
        $code = $_POST['otp'];
        
        if ($g->checkCode($secret, $code)) {

            $query = mysqli_query($con, "SELECT auth_qr_status FROM detail ");
            $row = mysqli_fetch_assoc($query);

            if($row["auth_qr_status"] == 1) {
                $query = mysqli_query($con, "UPDATE detail SET auth_qr_status = 0 ");
            }

            $query = mysqli_query($con, "INSERT into user_log (user_id) values ('{$_SESSION['tmpuser_id']}')");
            

            $_SESSION['user_id'] = $_SESSION['tmpuser_id'];
            $_SESSION['user_name'] = $_SESSION['tmpname'];
            if($_SESSION['tmprole'] == 'admin') {
                $_SESSION['user_type'] = 'Admin';
            }
            else {
                $_SESSION['user_type'] = 'User';
                $_SESSION['role'] = $_SESSION['tmprole'];
            }
            $_SESSION['tmpuser_id'] = $_SESSION['tmpname'] = $_SESSION['tmprole'] = '';
            echo 2;
        } else {
            echo 1;
        }
    }

    if($_POST['flag'] == "logout")
    {	
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_type']);
        unset($_SESSION['role']);
        echo 1;
    }

    function invalidPass(){
        if($_SESSION['invalidCount']){
            if($_SESSION['invalidCount'] < 4){
                $_SESSION['invalidCount']++;
            }
            else{
                $_SESSION['timeout'] = time()+120;
                $_SESSION['invalidCount'] = '';
                return 3;
            }
        }
        else{
            $_SESSION['invalidCount'] = 1;
        }
    }

    function sendmail($email, $rndno)
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
                                
        $mail->Subject = "OTP";
        $mail->Body    = '<div class="mainotp" style="width: 100%;max-width: 400px;height: auto;border:1px solid lightgrey;">
                <div class="headerlogo" style="background-color: #0e76a8;color:#FFF;font-size: 30px;text-align: center;padding: 10px;">
                '.TITLE.'
                </div>
                <div class="otpbox">
                    <div style="text-align: center;padding-top: 20px;letter-spacing: .7px;">one time Verification Code for Signin </div>
                    <div style="text-align: center;padding: 20px 0px;letter-spacing: .7px;font-size: 25px;">'.$rndno.'</div>
                </div>
            </div>';

        if($mail->send()) { return 1; } 
    }

?>
      