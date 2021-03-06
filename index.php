<?php
//session_start();
include('dbh.php');
include('user.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>CIES-Reminder</title>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/login.css" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-cyan login-page authentication">

<div class="container">
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title">Login <span class="msg">Sign in to start your session</span></h1>
         <?php
                if(isset($_POST['login_btn']))
                {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $object = new user();
                   $object->login($username,$password);
                }
        ?>
        <div class="col-md-12">
            <form id="sign_in" method="POST" action="index.php">
                
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div>
                    <div class="">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div>
                    <div class="text-center col-md-12">
                        <button class="btn btn-raised btn-block waves-effect g-bg-cyan" type="submit" name="login_btn">
                            SIGN IN
                        </button>
                        
                    </div>
                    <div class="text-center"> <a href="forgot-password.html">Forgot Password?</a></div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p class="text-bold">Developed by winnie David -- 1740803045 </p>
        </div>
    </div>    
</div>
<div class="theme-bg"></div>

<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
</body>
</html>