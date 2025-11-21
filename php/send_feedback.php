<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $to = "gharavi95@gmail.com"; 
    $subject = "New SclptCycle Feedback";
    
    // Safely extract fields
    $name = $_POST["name"] ?? "(no name)";
    $class = $_POST["class"] ?? "(no class given)";
    $rating = $_POST["rating"] ?? "(no rating)";
    $positives = $_POST["positives"] ?? "(empty)";
    $improvements = $_POST["improvements"] ?? "(empty)";
    $extra = $_POST["extra"] ?? "(empty)";

    // Build message
    $message = "New SclptCycle Feedback Submitted:\r\n\r\n";
    $message .= "Name: $name\r\n";
    $message .= "Class: $class\r\n";
    $message .= "Rating: $rating\r\n\r\n";
    $message .= "Positive Notes:\r\n$positives\r\n\r\n";
    $message .= "Suggestions:\r\n$improvements\r\n\r\n";
    $message .= "Extra Comments:\r\n$extra\r\n\r\n";

    // Create log folder if missing
    $logDir = __DIR__ . "/../logs";
    if (!is_dir($logDir)) {
        mkdir($logDir, 0775, true);
    }

    // File that stores all submissions
    $logFile = $logDir . "/feedback_log.txt";

    // Build log entry
    $logEntry = "---- New Submission ----\n" .
                "Time: " . date("Y-m-d H:i:s") . "\n" .
                "Name: $name\n" .
                "Class: $class\n" .
                "Rating: $rating\n" .
                "Positives: $positives\n" .
                "Improvements: $improvements\n" .
                "Extra: $extra\n" .
                "---- END ----\n\n";

    // Append to log file
    file_put_contents($logFile, $logEntry, FILE_APPEND);

    /*
    --------------------------------------------------------
    End of logging block
    --------------------------------------------------------
    */


    // Hostinger-safe headers
    $headers  = "From: leila@leilagharavi.com\r\n";
    $headers .= "Reply-To: leila@leilagharavi.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // SEND EMAIL
    if (mail($to, $subject, $message, $headers)) {
        echo "SUCCESS";
    } else {
        echo "ERROR";
    }
}
?>
