<?php
// Ensure the form was submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize the form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $feedback = htmlspecialchars(trim($_POST["message"]));

    // Validate the email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Define the recipient email address (e.g., your email address)
    $to = "oshiyokuolaoluwa@gmail.com"; 
    $subject = "Feedback from $name";
    
    // Construct the email body
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Feedback:\n$feedback";
    
    // Set the headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you for your feedback!";
    } else {
        echo "Sorry, there was an error sending your feedback.";
    }
} else {
    // Redirect to the form if not accessed via POST
    header("Location: index.html");
    exit();
}
?>

