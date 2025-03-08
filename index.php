<?php
session_start();
$db = new SQLite3('db.sqlite');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $query->bindValue(':username', $username);
    $query->bindValue(':password', $password);
    $result = $query->execute()->fetchArray();

    if ($result) {
        $_SESSION['username'] = $username;
        setcookie("SESSION_ID", session_id(), time() + 3600, "/", "", false, false); // Insecure Cookie
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
</form>
