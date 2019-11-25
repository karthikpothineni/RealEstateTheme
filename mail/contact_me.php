<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	print "No arguments Provided!";
	return false;
   }

$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


// Create the email and send the message
// $to = 'pvskarthik94@gmail.com,pprahladarao@gmail.com,karthikpvs94@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";
// mail($to,$email_subject,$email_body,$headers);

# Instantiate the client.
$mgClient = new Mailgun('7553a0bca261a6cd6dec305ff69ffe37-09001d55-6168e1c0');
$domain = "sandbox944cbbfdb6cf4e8b9f2d35efe828f1f5.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
	array('from'    => 'Customer <postmaster@sandbox944cbbfdb6cf4e8b9f2d35efe828f1f5.mailgun.org>',
		  'to'      => 'Venkata Sai Ram Karthik Pothineni <pvskarthik94@gmail.com>',
		  'subject' => 'Request for House',
		  'text'    => 'We got message from $name and details are Email: $email_address, Phone: $phone, Message: $message'));
return true;
?>