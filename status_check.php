<?php
if (isset($_GET['url'])) {
    $url = $_GET['url'];

    if (strpos($url, 'http://localhost') !== 0 && strpos($url, 'http://127.0.') !== 0) {
        die("Blocked: External URLs are not allowed.");
    }

    $response = file_get_contents($url);
    echo htmlentities($response);
}
?>
<link rel="stylesheet" href="styles.css">
<form>
    <h2>Check URL Status</h2>
    <input type="text" name="url" placeholder="Enter URL">
    <button type="submit">Check</button>
</form>
