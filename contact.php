<?php

if($_POST) {
    $name = "";
    $email = "";
    $subject = "";
    $message = "";

    if(isset($_POST['name'])) {
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['subject'])) {
        $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['message'])) {
        $visitor_message = htmlspecialchars($_POST['message']);
    }

    $recipient= "jn310803@gmail.com";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $email . "\r\n";

    if(mail($recipient, $subject, $message, $headers)) {
        echo "<p>Thank you for contacting me, $name. You will get a reply as soon as possible.</p>";
    } else {
        echo '<p>I are sorry but the email did not go through.</p>';
    }

} else {
    echo '<p>Something went wrong. Please try again later.</p>';
}

?>
