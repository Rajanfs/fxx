<?php

include('connect.php');

$email_id= $con->real_escape_string($_POST['email1']);

//$select_user = "select * from users where email='$email'";
//$result = mysqli_query($con,$select_user);
//$list_user = mysqli_fetch_array($list_query_company);

	$imgFile = $_FILES['user_image']['name'];
	$tmp_dir = $_FILES['user_image']['tmp_name'];
	$imgSize = $_FILES['user_image']['size'];
	
	//echo $imgFile , $imgSize ;
	$upload_dir = 'images/'; // upload directory
	
	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
	echo $imgSize ;
   // allow valid image file formats
   
	if(in_array($imgExt, $valid_extensions)){
//		Check file size '5MB'
		if($imgSize < 5000000)    {
			move_uploaded_file($tmp_dir,$upload_dir.$userpic);
		}else{
			$errMSG = "Sorry, your file is too large.";
		}
	}else{
		$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
	}

	mysqli_query($con,"UPDATE users SET url='$userpic',last_edited_by='$idofuser' where email='$email_id'");

	header("location: index.php");

?>