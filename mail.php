<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$budget = $_POST['budget'];
		$message = $_POST['message'];
		// Sender Email and Name 
		$from = stripslashes($_POST['name'])."<".stripslashes($_POST['email']).">";
		// Recipient Email Address 
		$to = 'admin@wpdna.com'; 
		// Email Subject 
		$subject = 'Johny Legend Contact';
		// Email Header 
		$headers = "From: $from\r\n" .
                 "MIME-Version: 1.0\r\n" .
        // Message Body 
		$body = "Name: $name\n Email: $email\n Budget: $budget\n Message:\n $message";
 		
 		// Check that data was sent to the mailer.
		if ( empty($name) OR empty($budget) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo 'Please complete the form and try again.';
			exit;
		}
		// If there are no errors, send the email
		if (mail ($to, $subject, $body, $from)) {
			echo 'Thank You! I will be in touch';
		} else {
			echo 'Sorry there was an error sending your message. Please try again later';
		}
	}
?>