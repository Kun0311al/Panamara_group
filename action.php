<?php
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
    echo "We Will Contact You Soon!";
    //to redirect at home page again
    header("refresh: 1; url = https://panameragroup.com/");
    $content = "You have a new appointment request from : $name \n
                Appointment Details:\n
                Name: $name \n
                Email: $email \n
                Phone Number: $phone \n
                Please contact $name at $email or $phone to schedule or confirm the appointment time.\n
                Thank you";
    $recipient = "kunalparkar@kccemsr.edu.in";
    //$ccRecipient = "kunalparkar1234@gmail.com";
    $mailheader = "From: $email \r\n";
    // $mailheader .= "CC: $ccRecipient \r\n";
    $subject = "You have a new appointment request";
    mail($recipient, $subject, $content, $mailheader) or die("Error!");
} else {
    echo "Error: ";
}

// Close the database connection
$conn->close();
?>
