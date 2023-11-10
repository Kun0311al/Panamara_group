<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    // Redirect to the login page
    header('Location: admin_login.php');
    exit();
}

// Rest of your admin panel code goes here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>

<h2>Admin Panel</h2>

<!-- Add New Data Form -->
<form action="add_data.php" method="post">
    <h1>Add New Data</h1>
    <label for="newEmail">Email:</label>
    <input type="email" id="newEmail" name="newEmail" required>
    <br>
    <label for="newLink">Link:</label>
    <input type="text" id="newLink" name="newLink" required>
    <br>
    <label for="newStatus">Status:</label>
    <input type="text" id="newStatus" name="newStatus" required>
    <br>
    <button type="submit">Add New Data</button>
</form>

<hr>

<!-- Update Data Form -->
<form action="update_data.php" method="post">
    <h1>Update Data</h1>
    <label for="updateEmail">Email:</label>
    <input type="email" id="updateEmail" name="updateEmail" required>
    <br>
    <label for="updateLink">Link:</label>
    <input type="text" id="updateLink" name="updateLink" required>
    <br>
    <label for="updateStatus">Status:</label>
    <input type="text" id="updateStatus" name="updateStatus" required>
    <br>
    <button type="submit">Update Data</button>
</form>

<!-- Delete Data Form -->
<form action="delete_data.php" method="post">
    <h1>Delete Data</h1>
    <label for="deleteEmail">Email:</label>
    <input type="email" id="deleteEmail" name="deleteEmail" required>
    <br>
    <button type="submit">Delete Data</button>
</form>

<!-- Display All Data -->
<h1>All Data</h1>
<table border="1">
    <tr>
        <th>Email</th>
        <th>Link</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    // Fetch all data from the database and display it in a table
    include 'display_data.php';
    ?>
</table>

</body>
</html>

