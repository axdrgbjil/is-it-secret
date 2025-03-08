<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $users = json_decode(file_get_contents('users.json'), true);
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($users[$username])) {
        echo "<p class='error'>Username already taken!</p>";
    } else {
        $users[$username] = ["password" => $password, "profile" => "New User"];
        file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

        echo "<p class='success'>Registration successful! <a href='index.php'>Login here</a></p>";
    }
}
?>

<link rel="stylesheet" href="styles.css">
<form method="POST">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>
