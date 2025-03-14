<?php


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $name \n Message: $message";
$recipient = "kayanotokuzato@hotmail.com";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");


$body = "From: $name_field\n E-Mail: $email_field\n Subject: $subject\n Message:\n $message";
 
//mail($to, $subject, $body, $headers);

echo <<< END
	Data has been submitted to $to!
	<script type="text/javascript">
		location.href="/";
	</script>
END;


?>
 