<!-- this is a alternative solution for the mailing system PHPMailer for this we have to include
 phpMailer from github repository using SMTP server-->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//path of phpMailer files
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Retrieve form data
$name = $_POST['pname'];
$email = $_POST['pemail'];
$phone = $_POST['pcontact'];

// Database connection settings
$servername = 'server_name_of_cpanel';
$username = "database_editor_name";
$password = "user_password";
$dbname = "database_name";

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
    //to redirect at home page again after 2 sec
    header("refresh: 2; url = https://panameragroup.com/");
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();

// Function to send email using PHPMailer
function sendEmail($name, $email, $phone) {
    $recipient = "your@email.com";
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
        $mail->Host       = 'outgoing_server';  // Specify the SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your@email.com';    // SMTP username
        $mail->Password   = 'email_password';    // SMTP password
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