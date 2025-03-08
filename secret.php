<?php
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1' && $_SERVER['HTTP_X_FORWARDED_FOR'] !== '127.0.0.1') {
    die("Access Denied: Only localhost (127.0.0.1) can view this file.");
}

echo file_get_contents('/var/www/html/flag.txt');
?>
