<!--fetch the client data from cpanel-->
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

// Fetch all data from the database
$sql = "SELECT * FROM Client_login";
$result = $conn->query($sql);

// Check if records are found
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Link"] . "</td>";
        echo "<td>" . $row["Status"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
