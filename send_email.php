<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$recipient_email = "tonyamenyo35@gmail.com"; // Replace with your actual email address

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = $recipient_email;
    $subject = "New Contact Form Submission";
    $email_body = "Name: $name\nEmail: $email\nMessage: $message";

    $headers = "From: $email";

    if (mail($to, $subject, $email_body, $headers)) {
        echo json_encode(['success' => true, 'message' => 'Form submitted successfully']);
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(['success' => false, 'message' => 'Error sending email']);
    }
}
?>