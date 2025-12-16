<?php
// checkPasskey.php

// Define your secret passkey here (server-side, hidden from JS)
$correctPasskey = "OPEN";

// Get passkey from POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userPasskey = $_POST["passkey"] ?? "";

    if ($userPasskey === $correctPasskey) {
        echo "success";
    } else {
        echo "fail";
    }
}
?>
