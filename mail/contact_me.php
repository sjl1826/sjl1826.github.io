<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'samlee.csit@gmail.com';          // SMTP username
$mail->Password = 'samuel518'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to

$mail->setFrom('info@example.com', 'CodexWorld');
$mail->addReplyTo('info@example.com', 'CodexWorld');
$mail->addAddress('john@gmail.com');   // Add a recipient
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>How to Send Email using PHP in Localhost by CodexWorld</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script by <b>CodexWorld</b></p>';

$mail->Subject = 'Email from Localhost by CodexWorld';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>

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
