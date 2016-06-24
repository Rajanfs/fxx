<?php
if(!isset($_SESSION)){session_start();}
function loggedin(){
	if(isset($_SESSION['user_id']) ){
		return true;
	} else {
		return false;
	}
}

function /*Upload mail function*/  mailToAll($subject, $msgHtml, $msgAltBody, $attachment = ''){
    global $con;
    
    $email_sql = "SELECT * FROM users'";
        $email_query = mysqli_query($con, $email_sql);
        while($emails = mysqli_fetch_assoc($email_query)){
            $mail = new PHPMailer;
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.postmarkapp.com'; // Here you can change the smtp host
            $mail->Port = 2525; // the smtp port
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "56de640b-951a-4422-ba9f-f60b71b1a2ad"; // smtp username
            $mail->Password = "56de640b-951a-4422-ba9f-f60b71b1a2ad"; // smtp password
            $mail->setFrom('trmx@fourthsignal.com', 'TRMX'); // the FROM email and name // they should be associated with your postmark account. in the signatures section
            $mail->addReplyTo('replyto@example.com', 'First Last'); // reply-to (free to use)
            $mail->addAddress($emails['email']);
            $mail->Subject = $subject;
            if ($attachment != ''){$mail->AddAttachment($attachment);}
            $mail->msgHTML($msgHtml);
            $mail->AltBody = $msgAltBody;
            if (!$mail->send()) {
                return "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    
    return true;
}
// same as upload but for download.
function downloadSectionMail($subject, $msgHtml, $msgAltBody, $attachment = ''){
    global $con;
    
    $email_sql = "SELECT * FROM users ";
        $email_query = mysqli_query($con, $email_sql);
        while($emails = mysqli_fetch_assoc($email_query)){
            $mail = new PHPMailer;
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.postmarkapp.com';
            $mail->Port = 2525;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "56de640b-951a-4422-ba9f-f60b71b1a2ad";
            $mail->Password = "56de640b-951a-4422-ba9f-f60b71b1a2ad";
            $mail->setFrom('trmx@fourthsignal.com', 'TRMX');
            $mail->addReplyTo('replyto@example.com', 'First Last');
            $mail->addAddress($emails['email']);
            $mail->Subject = $subject;
            if ($emails['email'] == 'karthikitram@gmail.com'){if ($attachment != ''){$mail->AddAttachment($attachment);}}
            $mail->msgHTML($msgHtml);
            $mail->AltBody = $msgAltBody;
            if (!$mail->send()) {
                return "Mailer Error: " . $mail->ErrorInfo;
            }
        }
    
    return true;
}

if(loggedin()){ 
$my_id = $_SESSION['user_id'];
	$user_query = mysqli_query($con,"SELECT * FROM users WHERE id = '$my_id' "); 
	$run_user = mysqli_fetch_array($user_query); 
	$nametoshow = $run_user['name']; 
	$idofuser = $run_user['id']; 
	$email = $run_user['email'];
	$user_client_id = $run_user['client'];
	
	$user_client_query = mysqli_query($con,"SELECT * FROM clients WHERE id = '$user_client_id' "); 
	$run_user_client = mysqli_fetch_array($user_client_query); 
	$user_client_name = $run_user_client['name']; 
	
	
	$user_level = $run_user['user_level']; 
	$level_query = mysqli_query($con,"SELECT name FROM user_level WHERE id = '$user_level' ");
	$run_level = mysqli_fetch_array($level_query); 
	$level_name = $run_level['name'];
}
?>