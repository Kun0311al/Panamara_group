<!--this page give the option to edit the database without going to cpanel-->
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
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        hr {
            margin-top: 30px;
            margin-bottom: 30px;
        }

    </style>
</head>
<body>

<h1>Admin Panel</h1>

<!-- Add New Data Form -->
<h2>Add New Data</h2>
<form action="add_data.php" method="post">
    <label for="newEmail">Name:</label>
    <input type="text" id="newName" name="newName" required>
    <br>
    <label for="newEmail">Email:</label>
    <input type="email" id="newEmail" name="newEmail" required>
    <br>
    <label for="newLink">Link:</label>
    <input type="text" id="newLink" name="newLink" placeholder="One Drive Link" required>
    <br>
    <label for="newStatus">Status:</label>
    <input type="text" id="newStatus" name="newStatus" placeholder="i.e. Active or Inactive" required>
    <br>
    <button type="submit">Add New Data</button>
</form>

<hr>

<!-- Update Data Form -->
<h2>Update Data</h2>
<form action="update_data.php" method="post">
    <label for="updateEmail">Email:</label>
    <input type="email" id="updateEmail" name="updateEmail" required>
    <br>
    <label for="updateLink">Link:</label>
    <input type="text" id="updateLink" name="updateLink" placeholder="One Drive Link" required>
    <br>
    <label for="updateStatus">Status:</label>
    <input type="text" id="updateStatus" name="updateStatus" placeholder="i.e. Active or Inactive" required>
    <br>
    <button type="submit">Update Data</button>
</form>

<hr>

<!-- Delete Data Form -->
<h2>Delete Data</h2>
<form action="delete_data.php" method="post">
    <label for="deleteEmail">Email:</label>
    <input type="email" id="deleteEmail" name="deleteEmail" required>
    <br>
    <button type="submit">Delete Data</button>
</form>

<!-- Display All Data -->
<h2>All Data</h2>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Link</th>
        <th>Status</th>
    </tr>
    <?php
    // Fetch all data from the database and display it in a table
    include 'display_data.php';
    ?>
</table>

</body>
</html>

