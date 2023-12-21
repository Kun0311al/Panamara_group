<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Retrieve form data
$name = $_POST['pname'];
$email = $_POST['pemail'];
$phone = $_POST['pcontact'];

// Database connection settings
$servername = 'bom1plzcpnl503502';
$username = 'panameragroup';
$password = 'Mayflower!12';
$dbname = 'panameragroup';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$sql = "INSERT INTO Contactdetails (User_Name, Email, Phone_No) VALUES ('$name', '$email', '$phone')";

if ($conn->query($sql) === true) {
    sendEmail($name, $email, $phone);
    echo "We Will Contact You Soon!";
    //to redirect at home page again
    header("refresh: 15; url = https://panameragroup.com/");
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();

// Function to send email using PHPMailer
function sendEmail($name, $email, $phone) {
    $recipient = "contact@panameragroup.com";
    $subject = "You have a new appointment request";

    $content = "You have a new appointment request from: $name \n
                Appointment Details:\n
                Name: $name \n
                Email: $email \n
                Phone Number: $phone \n
                Please contact $name at $email or $phone to schedule or confirm the appointment time.\n
                Thank you";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com';  // Specify the SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contact@outlook.com';    // SMTP username
        $mail->Password   = 'zskvcwtcbzyswttm';    // SMTP password
        $mail->SMTPSecure = 'tls';                    // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                      // TCP port to connect to
        $mail->setFrom($email, $email);
        $mail->addAddress($recipient);

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}
?>