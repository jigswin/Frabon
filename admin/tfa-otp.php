<?php
declare(strict_types=1);
session_start(); error_reporting(0); 
if($_SESSION['login'] != 'passed') echo "<script>location.href = 'login'</script>";

require ('vendor/autoload.php');
include("../config/config.php");
$secret = 'XVQ2UIGO75XRUKJO';
$link = '';

$query = mysqli_query($con, "SELECT auth_qr_status FROM detail ");
$row = mysqli_fetch_assoc($query);
if($row['auth_qr_status'] == 1){
    $link = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate(TITLE, $secret);
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
    
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                    <?php if($link != ''){ ?>
                        <!--<p class="">TO USE THIS, DOWNLOAD GOOGLE AUTHENTICATOR APPLICATION FROM GOOGLE PLAY STORE .</p>-->
                        <h5 style="color: #000;">TO DOWNLOAD APP CLICK THE LINK IN ANDROID MOBILE.</h5>
                        <br>
                        <a href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en_IN&gl=US" style="text-decoration-line: revert;">GOOGLE AUTHENTICATOR</a>
                        <br><br>
                        <img src="<?=$link?>"></img>
                        <br><br>
                        <p>SCAN QR CODE</p>

                        <!--<form class="text-left">-->
                        <!--    <div class="form">-->
                        <!--        <div id="username-field" class="field-wrapper input">-->
                        <!--            <label for="tTFA-code">Generate Your Own Security Code</label>-->
                        <!--            <input name="tTFA-code" id="tTFA-code" type="text" class="form-control" placeholder="Enter Code">-->
                        <!--            <span class="error tTFA-code-err"></span>-->
                        <!--        </div>-->
                        <!--        <div class="d-sm-flex justify-content-between mt-3">-->
                        <!--            <div class="field-wrapper">-->
                        <!--                <input type="submit" class="btn btn-primary" id="tTfaCodeSubmit" name="submit" value="Submit">-->
                        <!--            </div>-->
                        <!--        </div>                 -->
                        <!--    </div>-->
                        <!--</form>-->
                            <div class="field-wrapper">
                                <!--<input type="submit" class="btn btn-primary" href="security_code" name="submit" value="Submit">-->
                                <a class="btn btn-primary float-center" href="security_code">Submit</a>
                            </div>
                    <?php } else { ?>

                        <h4 style="color: #000;">GOOGLE AUTHENTICATOR OTP</h4>
                        <form class="text-left">
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="tTFA-otp">OTP</label>
                                    <input name="tTFA-otp" id="tTFA-otp" type="text" class="form-control" placeholder="Enter OTP" autocomplete="off" maxlength='6'>
                                    <span class="error tTFA-otp-err"></span>
                                </div>
                                <div class="d-sm-flex justify-content-between mt-3">
                                    <div class="field-wrapper">
                                        <input type="submit" class="btn btn-primary" id="tTfaSubmit" name="submit" value="Submit">
                                    </div>
                                </div>
                                <p class="mt-4" style="color: #000;">If your mobile lose or broken please click here!...         
                                <a href="tfa-code" style="font-size: 14px">Show QR Code</a></p>    
                            </div>
                        </form>
                    <?php } ?>

                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <div class="Mykq7 d-none"></div>
    <div class="GmWow d-none">
        <div class="qALeD">
            <div class="yXeRi"></div>
            <div class="yXeRi"></div>
            <div class="yXeRi"></div>
            <div class="UAuKb"></div>
            <div class="UAuKb"></div>
            <div class="UAuKb"></div>
            <span>Loading</span>
        </div>
    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/authentication/form-2.js"></script>

</body>
</html>