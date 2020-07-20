<?php 
    if($_COOKIE['admin'] == null)
    {
       header('location:../index.php');
    }
    include ('..\dbh.php'); 
    include ('..\user.php');?>
    <?php include ('function.php'); ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title> CIES-Reminder</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />
<link href="../assets/css/main.css" rel="stylesheet">
<link href="../assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Bootstrap Material Datetime Picker Css -->
<link href="../assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<!-- Wait Me Css -->
<link href="../assets/plugins/waitme/waitMe.css" rel="stylesheet" />
<link href="../assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<!-- Custom Css -->

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="../assets/css/themes/all-themes.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../assets/css/sweetalert.css">

<style type="text/css">
    .saveBtn{
        display: none;
    }
    .btn-group button{
        cursor: pointer;
    }
    .breadcrumb-item{
        color: blue;
    }
</style>
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader --> 
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->