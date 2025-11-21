<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $to = "gharavi95@gmail.com"; 
    $subject = "New SclptCycle Feedback";
    
    $name = $_POST["name"];
    $class = $_POST["class"];
    $rating = $_POST["rating"];
    $positives = $_POST["positives"];
    $improvements = $_POST["improvements"];
    $extra = $_POST["extra"];

    $message = "
    New SclptCycle Feedback Submitted:

    Name: $name
    Class: $class
    Rating: $rating

    Positive Notes:
    $positives

    Suggestions:
    $improvements

    Extra Comments:
    $extra
    ";

    // IMPORTANT:
    // Use a REAL email created in Hostinger Email accounts
    $headers  = "From: leila@leilagharavi.com\r\n";
    $headers .= "Reply-To: leila@leilagharavi.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "SUCCESS";
    } else {
        echo "ERROR";
    }
}
?>
