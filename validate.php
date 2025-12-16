<?php
// For demonstration purposes only - in production, use secure password hashing and database storage

// Hardcoded credentials (for demo only)
$valid_username = 'admin';
$valid_password = 'password123'; // In production, store hashed passwords

// Get POST data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate credentials
if ($username === $valid_username && $password === $valid_password) {
    echo 'success';
} else {
    echo 'error';
}
?>
