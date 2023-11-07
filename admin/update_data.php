<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

include('../includes/db_connect.php');

if (isset($_POST['email']) && isset($_POST['link']) && isset($_POST['status'])) {
    $email = $_POST['email'];
    $link = $_POST['link'];
    $status = $_POST['status'];

    // Prepare and execute an SQL query to add/update data
    $sql = "INSERT INTO contactdetails (User_Name, Email_Id, Status) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE User_Name = VALUES(User_Name), Email_Id = VALUES(Email_Id), Status = VALUES(Status)";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $email, $link, $status);
    $stmt->execute();
    $stmt->close();
}

header('Location: data_form.php');
?>
