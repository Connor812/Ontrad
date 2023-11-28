<?php
require_once('../config/db.php');
require_once("../config-url.php");

require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $sql = "SELECT `email` FROM `admin` WHERE id = 1";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();

        // Check if the row exists
        if ($row) {
            // Access the 'email' column for the single row
            $to = $row['email'];
            $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
            $comments = filter_var($_POST["comments"], FILTER_SANITIZE_STRING);

            // Validate email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
                exit;
            }

            // Email settings
            $subject = "New Comment from $name";
            $message = "Name: $name\nEmail: $email\n\n$comments";

            // Echo the values
            echo "To: $to<br>";
            echo "Name: $name<br>";
            echo "Email: $email<br>";
            echo "Comments: $comments<br>";
            echo "Subject: $subject<br>";
            echo "Message: $message<br>";

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = $to;
            $mail->Password = "bclq wati kuav pcdh";

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->setFrom($email, $name);
            $mail->addAddress($to);

            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();

            echo "email sent";

            // Redirect or display a success message as needed
            // Redirect to a success page
            header("Location: " . BASE_URL . "/success_sent_email.php");
            exit();
        } else {
            // Handle the case where no rows were returned
            echo "No email found";
        }

        // Free the result set
        $result->free();
    } else {
        // Handle the case where the query failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>