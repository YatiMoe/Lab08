<?php
session_start();
require_once("settings.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$new_email = $_POST['new_email'];

// Update query
$query = "UPDATE user SET email='$new_email' WHERE username='$username'";

if (mysqli_query($conn, $query)) {
    header("Location: profile.php");
    exit();
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
?>
