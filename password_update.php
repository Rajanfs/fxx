<?php
include('connect.php');

	$email = $con->real_escape_string($_POST['email1']); 
	$pass = $con->real_escape_string($_POST['old_pass']); 
	$new_pass = $con->real_escape_string($_POST['new_pass']); 
	$idofuser= $con->real_escape_string($_POST['added_by1']);
	
	$password = hash( 'sha256', $pass);

	$new_password = hash( 'sha256', $new_pass);
		
	if(count($_POST)>0) {
		$result = mysqli_query($con,"SELECT * from users WHERE email='$email'");
		$row=mysqli_fetch_array($result);

		if($password == $row["password"]) {
			
			mysqli_query($con,"UPDATE users set password='$new_password',last_edited_by='$idofuser' WHERE email='$email'");

			include('contact.php');
			
			header('location: change_pass_logout.php');

		} 
		
		else $message = "Current Password is not correct"; 
	};

	
?>