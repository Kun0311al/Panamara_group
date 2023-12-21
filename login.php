<!--this page handle the client.html's backend work-->
<?php
// Establish a database connection (replace these with your actual database credentials)
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

// Retrieve the email from the form
$email = $_POST['email'];

// Query the database
$sql = "SELECT * FROM Client_login WHERE Email = '$email'";
$result = $conn->query($sql);

// Check if a matching record is found
if ($result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();

    // Extract the link and status from the third and fourth columns
    $link = $row['Link'];
    $status = $row['Status'];

    // Check the status
    if ($status == 'Active' || $status == 'ACTIVE' || $status == 'active') {
        // Redirect to the link
        header("Location: $link");
        exit();
    } else {
        // Display a message or redirect to an error page
        echo "Session expired. Please contact the support team.";
        header("refresh: 2; url = https://panameragroup.com/");
    }
} else {
    // If no matching record is found, you can redirect to an error page or do something else
    echo "No matching record found!";
}

// Close the database connection
$conn->close();
?>
