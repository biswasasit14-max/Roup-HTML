// checkPasskey.php
<?php
// checkpasskey.php

// Securely store the correct passkey
$CORRECT_PASSKEY = "OPEN";

// Get user input
$userInput = isset($_POST['passkey']) ? trim($_POST['passkey']) : "";

// Validate
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
