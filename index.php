<?php
session_start();
$users = json_decode(file_get_contents('users.json'), true);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username]) && $users[$username]["password"] === $password) {
        $_SESSION['username'] = $username;
        setcookie("SESSION_ID", session_id(), time() + 3600, "/", "", false, false);
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<p class='error'>Invalid login!</p>";
    }
}
?>

<link rel="stylesheet" href="styles.css">
<form method="POST">
    <h2>Login</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
    <p><a href="register.php">Register Here</a></p>
</form>
