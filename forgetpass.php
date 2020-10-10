<?php
error_reporting('E_ALL ^ E_NOTICE');

require('db.php');
 use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['submit'])){
$email=$_POST['email'];
$select=$con->query("select * from register where email='$email'");
  $count=$select->num_rows;
  $fetch=$select->fetch_object();
  if($count==1){
 $password=$fetch->password;

// Load Composer's autoloader
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'ekarmaindia@gmail.com';                     // SMTP username
    $mail->Password   = '*******';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('ekarmaindia@gmail.com', 'sims');
    $mail->addAddress($email, ' User');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('ekarmaindia@gmail.com', 'Information');
 
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reset Password';
    $mail->Body    = 'Please find your password here:'.$password;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}else{
  	echo "Email is not registered in db";
  }

	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	
</head>
<body>
	<form class="login-form" action="" method="post">
		<h2 class="form-title">Enter Email :</h2>
		<!-- form validation messages -->
		<?php  ?>
		<div class="form-group">
			<label>Username or Email</label>
			<input type="text" value="" name="email">
		</div>
		
		<div class="form-group">
			<button type="submit" name="submit" class="login-btn">Send</button>
		</div>
		
	</form>
</body>
</html>