<?php
$servername = 'bom1plzcpnl503502';
$username = "panameragroup";
$password = "Mayflower!12";
$dbname = "panameragroup";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $updateEmail = $_POST['updateEmail'];
    $updateLink = $_POST['updateLink'];
    $updateStatus = $_POST['updateStatus'];

    // Update data in the database
    $sql = "UPDATE Client_login SET Link='$updateLink', Status='$updateStatus' WHERE Email='$updateEmail'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: admin.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
