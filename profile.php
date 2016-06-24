<?php 
//error_reporting(0);
 include 'connect.php';
 include 'functions.php'; 


if ($user_level != 1 and $user_level != 2 and $user_level != 3) {
	header('location: index.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forex| </title>
<script data-require="jquery@*" data-semver="2.1.3" src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
   
   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- left navigation -->
          <?php 
		  
		  if ($user_level == 1) {
		  
          include "super_admins/main_menu_sadmin.php";
		  } else { if ($user_level == 2){ 
		  include "admins/main_menu_admin.php";
		  } else {
			  if ($user_level == 3){ 
		  include "operators/main_menu_operator.php";
		  }
			  } }
          ?>
       <!-- /left navigation -->
        <!-- top navigation -->
        <?php include "top_nav.php"; ?>
        <!-- /top navigation -->


        <!-- page content -->
        <?php if ($user_level == 1) {
		  
          include "super_admins/sadmin_main.php";
		  } else { if ($user_level == 2){ 
		  include "admins/admin_main.php";
		  } else {
			  if ($user_level == 3){ 
		  include "operators/operator_main.php";
		  }
			  } } ?>
        <!-- /page content -->

        <!-- footer content -->
        
        
        <?php include "scripts.php"; ?>


        <?php include "footer.php"; ?>
        <!-- /footer content -->
        <?php } ?>