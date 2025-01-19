<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = sanitize_text_field($_POST["name"]);
    $email = sanitize_email($_POST["email"]);
    $subject = sanitize_text_field($_POST["subject"]);
    $message = sanitize_textarea_field($_POST["message"]);

    // Validasi
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        wp_send_json_error('Please complete the form and try again.');
        exit;
    }

    // Set email penerima
    $to = "your-actual-email@example.com"; // Ganti dengan email yang sebenarnya
    
    // Set headers
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>'
    );

    // Format pesan email
    $email_content = "
        <h3>New Contact Form Submission</h3>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Subject:</strong> {$subject}</p>
        <p><strong>Message:</strong></p>
        <p>{$message}</p>
    ";

    // Kirim email
    $mail_sent = wp_mail($to, $subject, $email_content, $headers);

    if ($mail_sent) {
        wp_send_json_success('Thank you! Your message has been sent.');
    } else {
        wp_send_json_error('Sorry, there was an error sending your message.');
    }
} 