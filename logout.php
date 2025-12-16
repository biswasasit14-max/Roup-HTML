<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
if (session_destroy()) {
    // Redirect to login page
    header('Location: /?logout=1');
} else {
    echo "Error: Could not log out properly.";
    echo '<br><a href="login.html">Return to login</a>';
}
exit();
?>
