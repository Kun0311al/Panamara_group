<?php
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Data</title>
</head>
<body>
    <h1>Manage Data</h1>
    <form method="POST" action="update_data.php">
        <label for="email">Email Address:</label>
        <input type="text" name="email" required><br>

        <label for="link">Link:</label>
        <input type="text" name="link" required><br>

        <label for="status">Status (true/false):</label>
        <input type="text" name="status" required><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
