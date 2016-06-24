<?php

include('connect.php');

$title= $con->real_escape_string($_POST['title']);
$first_name= $con->real_escape_string($_POST['first_name']);
$last_name= $con->real_escape_string($_POST['last_name']);
$idofuser= $con->real_escape_string($_POST['added_by']);
$email_id= $con->real_escape_string($_POST['email1']);

	mysqli_query($con,"UPDATE users SET salutation='$title',name='$first_name',last_name='$last_name',last_edited_by='$idofuser' where email='$email_id'");

	header("location: index.php");

?>