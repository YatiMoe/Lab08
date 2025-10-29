<?php
session_start();
require_once("settings.php");

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user info
$query = "SELECT * FROM user WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h2>Welcome, <?php echo $user['username']; ?>!</h2>

    <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>

    <h3>Edit Profile</h3>
    <form method="POST" action="update_profile.php">
        <label>New Email:</label>
        <input type="email" name="new_email" value="<?php echo $user['email']; ?>" required>
        <input type="submit" value="Update">
    </form>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
