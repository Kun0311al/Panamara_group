<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $entered_username = $_POST['username'];
    $entered_password = $_POST['password'];

    $correct_username = 'admin';
    $correct_password = 'password';

    if ($entered_username == $correct_username && $entered_password == $correct_password) {
        $_SESSION['admin'] = true;
        header('Location: admin.php');
    } else {
        echo "Incorrect login credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <form method="POST" action="admin_login.php">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
