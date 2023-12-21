<!--this page check the credentials of admin and give permission to admin page-->
<?php
// Hardcoded admin credentials
$adminUsername = 'set_username';
$adminPassword = 'set_password';

// Get user input
$userInputUsername = $_POST['username'];
$userInputPassword = $_POST['password'];

// Check if the provided credentials match the admin credentials
if ($userInputUsername === $adminUsername && $userInputPassword === $adminPassword) {
    // Start the session
    session_start();

    // Set a session variable to indicate that the user is logged in
    $_SESSION['admin'] = true;

    // Redirect to the admin panel
    header('Location: admin.php');
    exit();
} else {
    // Redirect back to the login page with an error message
    header('Location: admin_login.php?error=1');
    exit();
}
?>
