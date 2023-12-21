<!--this file store the data of contact form in database-->
<?php
// Access form data
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];

// Validate and process data (optional)
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
$sql = "INSERT INTO Contactdetails (User_Name, Email, Phone_No) VALUES ('$name', '$email', '$contact')";
if ($conn->query($sql) === true) {
    header("refresh: 0; url = https://panameragroup.com/thankyou.html");
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();