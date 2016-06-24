<?php 

include 'connect.php';
include 'functions.php'; 
session_destroy();
header('location: change_pass_index.php');
?> 