
<?php

	/* Namespace alias. */
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'src\Exception.php';
	require 'src\PHPMailer.php';
	require 'src\SMTP.php';


	/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
	$mail = new PHPMailer(TRUE);

	/* Use SMTP. */
	$mail->isSMTP();

	/* Google (Gmail) SMTP server. */
	$mail->Host = 'smtp.gmail.com';

	/* SMTP port. */
	$mail->Port = 587;

	/* Set authentication. */
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';

	$mail->Username = 'Jacques.Personal.Website.eServer@gmail.com';
	$mail->Password = 'jacques-password';

	/* Open the try/catch block. */
	try {

	   /* Set the mail sender. */
	   $mail->setFrom($_POST['email'], $_POST['email']);

	   /* Add a recipient. */
	   $mail->addAddress('jacques.louis.fracchia@gmail.com', 'Jacques Fracchia');

	   /* Set the subject. */
	   $mail->Subject = $_POST['name'];

	   /* Set the mail message body. */
	   $mail->Body = $_POST['message'];

	   /* Finally send the mail. */
	   $mail->send();
	   header("Location: https://jacquesfracchia.com/");
	   die();
	}
	catch (Exception $e)
	{
	   /* PHPMailer exception. */
	   echo $e->errorMessage();
	}
	catch (\Exception $e)
	{
	   /* PHP exception (note the backslash to select the global namespace Exception class). */
	   echo $e->getMessage();
	}

	/*
	$myAwardSpaceEmail = "jacques.louis.fracchia@jacquesfracchia.com";
    $myPersonalEmail = "jacques.louis.fracchia@gmail.com";
    
    if(isset($_POST['submit'])) {
        $subject = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $headers = "From: Contact Form <" . $myAwardSpaceEmail . ">" . "\r\n";
        $headers .= "Reply-To: " . $name . " <" . $email .">" . "\r\n";
        
        echo 'Your message was sent successfully!';
        mail($myPersonalEmail, $subject, $message, $headers);
    } else {
        echo 'An error has occurred!';
    }

	header("Location: https://jacquesfracchia.com/");
	die();
	*/
?>