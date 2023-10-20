<?php
// Check for empty fields and valid email
if (
    empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['phone']) ||
    empty($_POST['message']) ||
    !filter_var($_POST['gmail'], FILTER_VALIDATE_EMAIL)
) {
    echo "No arguments Provided!";
    exit; // Use exit instead of return to terminate the script
}

// Sanitize and store form data
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['gmail']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email content
$to = 'jestinjohnson1@gmail.com'; // Replace with your email address
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"
    . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@gmail.com\n"; // Replace with a suitable 'from' address.
$headers .= "Reply-To: $email_address";

// Send the email
if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Email sent successfully";
} else {
    echo "Email could not be sent. Check your server's mail configuration.";
}
?>
