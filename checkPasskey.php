<?php
// checkpasskey.php

// Define the correct passkey securely on the server
$CORRECT_PASSKEY = "secure123";

// Get the passkey sent from the client
$userInput = isset($_POST['passkey']) ? trim($_POST['passkey']) : "";

// Compare and return JSON response
if ($userInput === $CORRECT_PASSKEY) {
    echo json_encode([
        "success" => true,
        "message" => "Authentication successful! You can now access the portal."
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Invalid passkey. Please try again."
    ]);
}
?>
