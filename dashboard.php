<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<link rel="stylesheet" href="styles.css">
<h2>Welcome, <?php echo htmlentities($_SESSION['username']); ?>!</h2>
<a href="profile.php">Edit Profile</a> |
<a href="status_check.php">Check Status</a> |
<a href="logout.php">Logout</a>
