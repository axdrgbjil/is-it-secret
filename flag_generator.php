<?php
session_start();
if (!isset($_SESSION['last_request'])) {
    $_SESSION['last_request'] = time();
} else {
    if (time() - $_SESSION['last_request'] < 5) {  // 5 seconds cooldown
        die("Too many requests. Try again later.");
    }
    $_SESSION['last_request'] = time();
}

// Generate a new 4-character random string
$random_suffix = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);

// Save the flag in a file
file_put_contents('/var/www/html/flag.txt', "FLAG{s3cREt_4cC3s5_$random_suffix}");

echo "Flag generated: FLAG{s3cREt_4cC3s5_$random_suffix}\n";
?>
