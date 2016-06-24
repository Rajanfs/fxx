<?php 
include 'connect.php'; 
include 'functions.php'; 
if (!empty($my_id )) {

 echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";	 } else {
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TRMX Platform | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form"> 
        
       <?php
if(isset($_POST['submit'])) {
	$email = $con->real_escape_string($_POST['email']); 
	$pass = $con->real_escape_string($_POST['password']); 
	$password = hash( 'sha256', $pass);
	
	$check_login = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'"); 
	if(mysqli_num_rows($check_login) == 1){
		$run = mysqli_fetch_array($check_login);
		$user_id = $run['id']; 
		$type = $run['type'];
		$user_level = $run['user_level'];
		if($type == '2'){
echo "Your account is deactivated";			
		} else {
			$_SESSION['user_id'] = $user_id; 
			
			
			
			 echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";	
		
		
		}
		
		
	} else {
		echo "Username or Password is incorrect";
	
	}
}
?>

<section>
            <form method="post">
              <h1>Login to continue</h1>
			  <h6>Login with New Password</h6>
              <div>
                <input type="text" name="email" class="form-control" placeholder="Email" required />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required />
              </div>
              <div>
                <input class="btn btn-default submit" type="submit" name="submit" value="Log in"/>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw" style="font-size: 26px;"></i> TRMX Platform</h1>

                  <p>©2015 All Rights Reserved. TRMX</p>
                </div>
              </div>
            </form>
        </div>

       
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<?php } ?>