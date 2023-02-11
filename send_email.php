<?php
// Check for form submission
if (isset($_POST['name']) && isset($_POST['phone_no']) && isset($_POST['email']) && isset($_POST['message'])) {
	// Retrieve the form data
	$name = $_POST['name'];
	$phone_no = $_POST['phone_no'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	// Validate the form data (you may want to add more validation logic here)
	if (empty($name) || empty($email) || empty($message)) {
		// Return an error message if any required fields are empty
		http_response_code(400);
		echo "Please fill in all required fields.";
		exit;
	}
	
	// Compose the email message
	$to = "ralphrvr@gmail.com"; // Replace with your email address
	$subject = "New message from contact form";
	$body = "Name: $name\nPhone Number: $phone_no\nEmail: $email\n\nMessage:\n$message";
	$headers = "From: $email";
	
	// Send the email
	if (mail($to, $subject, $body, $headers)) {
		// Return a success message
		http_response_code(200);
		echo "Your message has been sent.";
	} else {
		// Return an error message if the email sending failed
		http_response_code(500);
		echo "There was an error sending your message. Please try again later.";
	}
} else {
	// Return an error message if the form was not submitted correctly
	http_response_code(400);
	echo "Please submit the form correctly.";
	exit;
}
