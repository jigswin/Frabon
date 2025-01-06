<?php
declare(strict_types=1);
session_start(); error_reporting(0); 
if($_SESSION['login'] != 'passed') echo "<script>location.href = 'login'</script>";

require ('vendor/autoload.php');
include("../config/config.php");
$secret = 'XVQ2UIGO75XRUKJO';
$link = ''; $error = "";

if($_SESSION['tmp_code'] == $_GET['code']){
    unset($_SESSION['tmp_code']);
    $link = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate(TITLE, $secret);
}
else {
    $error = "Invalid code, please try again";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Two Factor Authentication - OTP</title>
    <link rel="icon" type="image/x-icon" href="../image/favicon.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
</head>
<body class="form">
<?php if($link != ''){ ?>
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <p class="">TO USE THIS, DOWNLOAD GOOGLE AUTHENTICATOR APPLICATION FROM ANDROID PLAY STORE .</p>

                        <img src="<?=$link?>"></img>
                        <br><br>
                        <p>SCAN QR CODE</p>
                        <a href="tfa-otp">Back to OTP page</a>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <?php } else {
        echo $error;
    } ?>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/app.js"></script>


</body>
</html>