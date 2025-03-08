<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    // Block external requests
    if (strpos($url, 'http://localhost') !== 0 && strpos($url, 'http://127.0.') !== 0) {
        die("Blocked: External URLs are not allowed.");
    }

    // Fetch data
    $response = file_get_contents($url);
    echo htmlentities($response);
}
?>
