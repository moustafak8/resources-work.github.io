<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Save data to database
    $sql = "INSERT INTO contacts (name, subject, phone, email, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $subject, $phone, $email, $message);

    if ($stmt->execute()) {
        // Email settings
        $to = 'youremail@example.com'; // Replace with your email address
        $email_subject = "New Contact Form Submission: $subject";
        $email_body = "You have received a new message from the contact form.\n\n".
                      "Name: $name\n".
                      "Subject: $subject\n".
                      "Phone: $phone\n".
                      "Email: $email\n".
                      "Message:\n$message\n";
        $headers = "From: no-reply@yourdomain.com\n"; // Replace with your domain

        // Send the email
        if (mail($to, $email_subject, $email_body, $headers)) {
            echo "Contact form submitted successfully and email sent!";
        } else {
            echo "Contact form submitted, but email could not be sent.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
