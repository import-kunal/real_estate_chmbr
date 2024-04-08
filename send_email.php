<?php
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
        header("Location: index.php?msg=$msg");

    } else {
        $msg_not = "Oops ! there was an issue in sending this mail.";
        header("Location: index.php?msg=$msg");

    }
}

