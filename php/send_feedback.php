<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $to = "YOUR_EMAIL_HERE"; 
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

    $headers = "From: feedback@yourdomain.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "SUCCESS";
    } else {
        echo "ERROR";
    }
}
?>
