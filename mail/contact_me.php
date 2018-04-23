<?php
require 'PHPMailer/PHPMailerAutoload.php';

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'samlee.csit@gmail.com';          // SMTP username
$mail->Password = 'samuel518'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('noreply@gmail.com', "Website Contact Form:  $name");
$mail->addReplyTo(email_address, "Website Contact Form:  $name");
$mail->addAddress('samlee.csit@gmail.com');   // Add a recipient

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>"Website Contact Form: $name"</h1>';
$bodyContent .= '<p>"You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message"</p>';

$mail->Subject = 'Website Contact Form: $name';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}




// $mail = new PHPMailer;

// $mail->isSMTP();                            // Set mailer to use SMTP
// $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                     // Enable SMTP authentication
// $mail->Username = 'samlee@gmail.com';          // SMTP username
// $mail->Password = 'samuel518'; // SMTP password
// $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                          // TCP port to connect to
// 	$mail->isHTML(true);  // Set email format to HTML

// // Create the email and send the message
// $to = 'samlee.csit@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
// $headers = "From: noreply@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";	
// mail($to,$email_subject,$email_body,$headers);
// return true;			
// ?>
