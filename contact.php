<?php
session_start();

require 'mailer/PHPMailerAutoload.php';

if(isset($_POST["submit"]))

 {

 //if($_SESSION['capcha_key'] == $_POST['capcha'])
 //{
 
$subject1 = "New Enquiry From Website - Contact Us";



	$message1 = "<b>Enquiry details as follow:</b><br><br>


	<b> Name : </b> $_POST[name]<br><br>



 	<b>Email : </b>$_POST[email]<br><br>



	<b>Phone : </b>$_POST[phone]<br><br>
	
	
 
    <b>Message :</b> $_POST[message]<br><br>



	<br><br>";



	$subject2 = "Acknowledgement from DRA Group";



	$message2 = "<em>Dear  $_POST[name]</em>



<br />



<br />



We thank you for showing interest in our project, Tuxedo at Velachery and registering with us.<br><br>

This is an auto-response from DRA Group's help desk. It will be our best endeavor to revert to you in the earliest possible time. <br><br>

In case of further queries, please send an email to info.chennai@drahomes.in<br><br>

Assuring you of our best services. <br><br>

Many Thanks and Best Regards,<br><br>
Tuxedo Team (DRA Group)";




$mail = new PHPMailer; 
/*
$mail->SMTPDebug = 4;                               // Enable verbose debug output
$mail->isSMTP();                                    // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                             // Enable SMTP authentication
$mail->Username = 'nileshcool@gmail.com';           // SMTP username
$mail->Password = 'password';                       // SMTP password
$mail->SMTPSecure = 'tls';                          // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  */                   


 //Set who the message is to be sent from
$mail->setFrom('karthik.r@fourthsignal.com');
$mail->addAddress('aneesh.g@fourthsignal.com'); // To Address 
//$mail->addAddress('karthika@opendesignsin.com'); // To Address
$mail->addCC('');
//Set the subject line
$mail->Subject = $subject1;
//Read an HTML message body from an external file, convert referenced images to embedded,
//Replace the plain text body with one created manually
$mail->Body = $message1;
$mail->IsHTML(true);
$mail->send();

 	header("location: change_pass_logout.php");

exit;

}
 
?>