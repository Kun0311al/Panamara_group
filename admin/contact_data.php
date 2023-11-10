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

// Fetch all data from the database
$sql = "SELECT * FROM Contactdetails";
$result = $conn->query($sql);

// Check if records are found
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["I'd"] . "</td>";
        echo "<td>" . $row["Date"] . "</td>";
        echo "<td>" . $row["User_Name"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Phone_No"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();
?>
