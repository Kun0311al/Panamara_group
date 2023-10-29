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
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
