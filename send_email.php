<?php
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $meeting_platform = $_POST['meeting_platform'];
    $datetime = $_POST['datetime'];
    $phone = $_POST['phone'];

    $to = 'storage.kunalwaghmare@gmail.com';
    $subject = 'New Contact Form Submission';
    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Meeting Platform: $meeting_platform\n";
    $message .= "Date & Time: $datetime\n";
    $message .= "Phone Number: $phone\n";

    $headers = "From: $email\r\nReply-To: $email";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        $msg = "Your Email Was Sent Successfully !!";
        // Redirect to index.php with success message
        header("Location: index.php?msg=".urlencode($msg));
        exit(); // Ensure script stops execution after redirection
    } else {
        $msg = "Oops! There was an issue in sending this mail.";
        // Redirect to index.php with error message
        header("Location: index.php?msg=".urlencode($msg));
        exit(); // Ensure script stops execution after redirection
    }
}
