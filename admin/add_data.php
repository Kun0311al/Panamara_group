<!--adding new data in database-->
<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $newName = $_POST['newName'];
    $newEmail = $_POST['newEmail'];
    $newLink = $_POST['newLink'];
    $newStatus = $_POST['newStatus'];

    // Insert data into the database
    $sql = "INSERT INTO Client_login (Name, Email, Link, Status) VALUES ('$newName', '$newEmail', '$newLink', '$newStatus')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
