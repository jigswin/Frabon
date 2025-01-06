<?php session_start();
if($_SESSION['login'] != 'passed') echo "<script>location.href = 'login'</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Two Factor Authentication - Code</title>
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

                        <h4 style="color: #000;">SECURITY CODE</h4>
                        <form class="text-left">
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="tTFA-code">Security Code</label>
                                    <input name="tTFA-code" id="tTFA-code" type="text" class="form-control" placeholder="Enter Code">
                                    <span class="error tTFA-code-err"></span>
                                </div>
                                <div class="d-sm-flex justify-content-between mt-3">
                                    <div class="field-wrapper">
                                        <input type="submit" class="btn btn-primary" id="tTfaCodeCheck" name="submit" value="Submit">
                                    </div>
                                </div>  
                                <br>
                                <a href="javascript:;" class="forgot-pass-link" id="tTfaSendCode" style="float: right;">Forgot Code?</a>
               
                            </div>
                        </form>

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